<?php
    /**
     * SISTEMA DE SEGURIDAD DE APLICACIONES
     * URL: module/AuthDoctrine/src/AuthDoctrine/Controller/RegistrationController.php
     * Controlador para el registro/modificacion de claves de usuarios
     */

    namespace AuthDoctrine\Controller;

    use Application\Entity\Usuario;
    use AuthDoctrine\Form\CambiarPasswordFilter;
    use AuthDoctrine\Form\CambiarPasswordForm;
    use AuthDoctrine\Form\ForgottenPasswordFilter;
    use AuthDoctrine\Form\ForgottenPasswordForm;
    use AuthDoctrine\Form\RegistrationFilter;
    use AuthDoctrine\Form\RegistrationForm;
    use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
    use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;
    use Zend\Form\Element;
    use Zend\Mail\Message;
    use Zend\Mime\Message as MimeMessage;
    use Zend\Mime\Part as MimePart;
    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\View\Model\ViewModel;

    class RegistrationController extends AbstractActionController
    {
        /**
         * Metodo para registro de Usuario
         */
        public function indexAction()
        {
            $layout = $this->layout('layout/layout-login');

            $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
            $user = new Usuario;
            $form = new RegistrationForm();
            $form->get('submit')->setValue('Registrar');
            $form->setHydrator(new DoctrineHydrator($entityManager, 'Application\Entity\Usuario'));
            $form->bind($user);
            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter(new RegistrationFilter($this->getServiceLocator()));
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $this->prepareData($user);
                    $this->sendConfirmationEmail($user);
                    $this->flashMessenger()->addMessage($user->getUsrEmail());
                    $entityManager->persist($user);
                    $entityManager->flush();
                    return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'registration', 'action' => 'registration-success'));
                }
            }
            return new ViewModel(array('form' => $form));
        }

        /**
         * Metodo para mostrar mensaje de registro de usuario
         */
        public function registrationSuccessAction()
        {
            $layout = $this->layout('layout/layout-login');
            $usr_email = null;
            $flashMessenger = $this->flashMessenger();
            if ($flashMessenger->hasMessages()) {
                foreach ($flashMessenger->getMessages() as $key => $value) {
                    $usr_email .= $value;
                }
            }
            return new ViewModel(array('usr_email' => $usr_email));
        }

        /**
         * Metodo para confirmar creacion de usuario
         */
        public function confirmEmailAction()
        {
            $this->layout('layout/layout-login');

            $token = $this->params()->fromRoute('id');
            $viewModel = new ViewModel(array('token' => $token));
            try {
                $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
                $user = $entityManager->getRepository('\Application\Entity\Usuario')->findOneBy(array('usrRegistrationToken' => $token)); //
                $user->setUsrActive('1');
                $user->setUsrEmailConfirmed('1');
                $entityManager->persist($user);
                $entityManager->flush();
            } catch (\Exception $e) {
                $viewModel->setTemplate('auth-doctrine/registration/confirm-email-error.phtml');
            }
            return $viewModel;
        }

        /**
         * Metodo para cambio de ContraseÃ±a
         */
        public function cambiarPasswordAction()
        {
            $messages = null;
            $this->layout('layout/layout-login');
            $form = new CambiarPasswordForm();
            $form->get('submit')->setValue('Guardar');
            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter(new CambiarPasswordFilter($this->getServiceLocator()));
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $data = $form->getData();
                    $usrName = $data['usrName'];
                    $usrPasswordActual = $data['usrPasswordOld']; // Clave Actual
                    $usrPassword = $data['usrPassword'];  // Clave Nueva
                    $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

                    //$user = $entityManager->getRepository('Application\Entity\Usuario')->findOneBy(array('usrName' => $usrName));

                    //Obteniendo servicio de AuthenticationService
                    $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                    $adapter = $authService->getAdapter();
                    $adapter->setIdentityValue($usrName);
                    $adapter->setCredentialValue($usrPasswordActual);
                    $authResult = $authService->authenticate();
                    //Verificando credenciales vÃ¡lidas
                    if ($authResult->isValid()) {
                        $user = $authResult->getIdentity();
                        $password = $usrPassword;
                        $passwordHash = $this->encriptPassword($this->getStaticSalt(), $password, $user->getUsrPasswordSalt());
                        //Verificando si la clave actual es igual a la nueva
                        if ($user->getUsrPassword() != $passwordHash) {
                            $usrEmail = $user->getUsrEmail();
                            //$this->sendPasswordByEmail($usrEmail, $password);
                            $this->flashMessenger()->addMessage($usrEmail);
                            $user->setUsrPasswordSalt($usrPassword); // Clave ingresada
                            $user->setUsrPassword($passwordHash);
                            $entityManager->persist($user);
                            $entityManager->flush();
                            return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'registration', 'action' => 'password-change-success'));
                        }else{
                            $messages = "ERROR<br> La CLAVE NUEVA no debe ser igual a la CLAVE ACTUAL, verifique por favor.";
                        }
                    } else {
                        $messages = "CREDENCIALES INVÁLIDAS<br> Usuario y/o Clave Actual incorrectas, verifique por favor.";
                    }
                }
            }
            return new ViewModel(array('form' => $form, 'messages' => $messages,));
        }

        /**
         * Metodo para recordar ContraseÃ±a
         */
        public function forgottenPasswordAction()
        {
            $this->layout('layout/layout-login');
            $form = new ForgottenPasswordForm();
            $form->get('submit')->setValue('Enviar');
            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter(new ForgottenPasswordFilter($this->getServiceLocator()));
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $data = $form->getData();
                    $usrEmail = $data['usrEmail'];
                    $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
                    $user = $entityManager->getRepository('Application\Entity\Usuario')->findOneBy(array('usrEmail' => $usrEmail)); //
                    $password = $this->generatePassword();
                    $passwordHash = $this->encriptPassword($this->getStaticSalt(), $password, $user->getUsrPasswordSalt());
                    //$this->sendPasswordByEmail($usrEmail, $password);
                    $this->flashMessenger()->addMessage($usrEmail);
                    $user->setUsrPassword($passwordHash);
                    $entityManager->persist($user);
                    $entityManager->flush();
                    return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'registration', 'action' => 'password-change-success'));
                }
            }
            return new ViewModel(array('form' => $form));
        }

        /**
         * Metodo para recordar Contraseña
         */
        public function recordarPasswordAction()
        {
            $this->layout('layout/layout-login');
            $form = new ForgottenPasswordForm();
            $form->get('submit')->setValue('Enviar');
            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter(new ForgottenPasswordFilter($this->getServiceLocator()));
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $data = $form->getData();
                    $usrEmail = $data['usrEmail'];
                    $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
                    $user = $entityManager->getRepository('AuthDoctrine\Entity\Usuario')->findOneBy(array('usrEmail' => $usrEmail)); //
                    $password = $this->generatePassword();
                    $passwordHash = $this->encriptPassword($this->getStaticSalt(), $password, $user->getUsrPasswordSalt());
                    //$this->sendPasswordByEmail($usrEmail, $password);
                    $this->flashMessenger()->addMessage($usrEmail);
                    $user->setUsrPasswordSalt($password); // Clave ingresada
                    $user->setUsrPassword($passwordHash);
                    $entityManager->persist($user);
                    $entityManager->flush();
                    return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'registration', 'action' => 'password-change-success'));
                }
            }
            return new ViewModel(array('form' => $form));
        }

        /**
         * Metodo para mostrar mensaje de Cambio de ContraseÃ±a
         */
        public function passwordChangeSuccessAction()
        {
            $this->layout('layout/layout-login');
            if ($this->flashMessenger()->hasMessages()) {
                $usr_email = null;
                $flashMessenger = $this->flashMessenger();
                if ($flashMessenger->hasMessages()) {
                    foreach ($flashMessenger->getMessages() as $key => $value) {
                        $usr_email .= $value;
                    }
                }
                return new ViewModel(array('usr_email' => $usr_email));
            } else {
                return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'index', 'action' => 'login'));
            }
        }

        /**
         * Metodo para preparacin de datos para registro de usuario
         */
        public function prepareData($user)
        {
            $user->setUsrActive(0);
            $user->setUsrPasswordSalt($this->generateDynamicSalt());
            $user->setUsrPassword($this->encriptPassword(
                $this->getStaticSalt(),
                $user->getUsrPassword(),
                $user->getUsrPasswordSalt()
            ));
            $user->setUsrlId(2);
            $user->setLngId(1);
            $user->setUsrRegistrationDate(new \DateTime());
            $user->setUsrRegistrationToken(md5(uniqid(mt_rand(), true))); // $this->generateDynamicSalt();
            //$user->setUsrRegistrationToken(uniqid(php_uname('n'), true));
            $user->setUsrEmailConfirmed(0);
            return $user;
        }

        /**
         * Metodo para generar nÃºmero aleatorio
         */
        public function generateDynamicSalt()
        {
            $dynamicSalt = '';
            for ($i = 0; $i < 50; $i++) {
                $dynamicSalt .= chr(rand(33, 126));
            }
            return $dynamicSalt;
        }

        /**
         * Metodo para obtener numero aleatorio registrado en la base de datos
         */
        public function getStaticSalt()
        {
            $staticSalt = '';
            $config = $this->getServiceLocator()->get('Config');
            $staticSalt = $config['static_salt'];
            return $staticSalt;
        }

        /**
         * Metodo para encriptar una cadena (password)
         */
        public function encriptPassword($staticSalt, $password, $dynamicSalt)
        {
            //return $password = md5($staticSalt . $password . $dynamicSalt);
            return $password = md5($password);
        }

        /**
         * Metodo para generar ContraseÃ±a
         */
        public function generatePassword($l = 8, $c = 0, $n = 0, $s = 0)
        {
            // get count of all required minimum special chars
            $count = $c + $n + $s;
            $out = '';
            // sanitize inputs; should be self-explanatory
            if (!is_int($l) || !is_int($c) || !is_int($n) || !is_int($s)) {
                trigger_error('Argument(s) not an integer', E_USER_WARNING);
                return false;
            } elseif ($l < 0 || $l > 20 || $c < 0 || $n < 0 || $s < 0) {
                trigger_error('Argument(s) out of range', E_USER_WARNING);
                return false;
            } elseif ($c > $l) {
                trigger_error('Number of password capitals required exceeds password length', E_USER_WARNING);
                return false;
            } elseif ($n > $l) {
                trigger_error('Number of password numerals exceeds password length', E_USER_WARNING);
                return false;
            } elseif ($s > $l) {
                trigger_error('Number of password capitals exceeds password length', E_USER_WARNING);
                return false;
            } elseif ($count > $l) {
                trigger_error('Number of password special characters exceeds specified password length', E_USER_WARNING);
                return false;
            }

            // all inputs clean, proceed to build password

            // change these strings if you want to include or exclude possible password characters
            $chars = "abcdefghijklmnopqrstuvwxyz";
            $caps = strtoupper($chars);
            $nums = "0123456789";
            $syms = "!@#$%^&*()-+?";

            // build the base password of all lower-case letters
            for ($i = 0; $i < $l; $i++) {
                $out .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            }

            // create arrays if special character(s) required
            if ($count) {
                // split base password to array; create special chars array
                $tmp1 = str_split($out);
                $tmp2 = array();

                // add required special character(s) to second array
                for ($i = 0; $i < $c; $i++) {
                    array_push($tmp2, substr($caps, mt_rand(0, strlen($caps) - 1), 1));
                }
                for ($i = 0; $i < $n; $i++) {
                    array_push($tmp2, substr($nums, mt_rand(0, strlen($nums) - 1), 1));
                }
                for ($i = 0; $i < $s; $i++) {
                    array_push($tmp2, substr($syms, mt_rand(0, strlen($syms) - 1), 1));
                }

                // hack off a chunk of the base password array that's as big as the special chars array
                $tmp1 = array_slice($tmp1, 0, $l - $count);
                // merge special character(s) array with base password array
                $tmp1 = array_merge($tmp1, $tmp2);
                // mix the characters up
                shuffle($tmp1);
                // convert to string for output
                $out = implode('', $tmp1);
            }

            return $out;
        }

        /**
         * Metodo para enviar correo para confirmar usuario
         */
        public function sendConfirmationEmail($user)
        {
            // $view = $this->getServiceLocator()->get('View');
            $transport = $this->getServiceLocator()->get('mail.transport');
            $message = new Message();
            $this->getRequest()->getServer();  //Server vars
            $message->addTo($user->getUsrEmail())
                //->addFrom('praktiki@coolcsn.com')
                ->setSubject('Please, confirm your registration!')
                ->setBody("Please, click the link to confirm your registration => " .
                    $this->getRequest()->getServer('HTTP_ORIGIN') .
                    $this->url()->fromRoute('auth-doctrine/default', array(
                        'controller' => 'registration',
                        'action' => 'confirm-email',
                        'id' => $user->getUsrRegistrationToken())));
            $transport->send($message);
        }

        /**
         * Metodo para envio de correo del cambio de contraseÃ±a
         */
        public function sendPasswordByEmail($usrEmail, $password)
        {
            try {

                //throw new \Exception('DivisiÃ³n por cero.');

                $transport = $this->getServiceLocator()->get('mail.transport');
                $message = new Message();

                //OBTENIENDO URL DEL ARCHIVO config
                $configIni = new \Zend\Config\Reader\Ini();
                $config = $configIni->fromFile(getcwd() . "/config/config-general.ini");
                $urlLogin = $config['seguridad']['url_login'];

                //MENSAJE
                $bodyHtml =
                    "Estimad@ usuari@, su clave ha sido modificada.<br>" .
                    "Su nueva clave es: " . $password .
                    "<br><br>" .
                    "URL: <a href='" . $urlLogin . "'>" . $urlLogin . "</a>" .
                    "<br><br>" .
                    "<h3>ATENCI&Oacute;N: El uso de sus credenciales es de caracter estrictamente personal.</h3>" .
                    "Saludos." .
                    "<br><br>";

                //FROM
                $from = $config['mail']['from'];

                //
                $subject = 'MEFP - SISTEMA DE SEGURIDAD - Cambio de clave';

                $html = new MimePart($bodyHtml);
                $html->type = "text/html";
                $body = new MimeMessage();
                $body->setParts(array($html));

                $message->addTo($usrEmail)
                    ->addFrom($from)
                    ->setSubject($subject)
                    ->setBody($body);
                $transport->send($message);

            }catch (\Exception $e){
                echo "<script>alert('OCURRIO UN ERROR AL ENVIAR UN CORREO, FAVOR INTENTE EN UNOS MINUNTOS POR FAVOR, GRACIAS,')</script>";
                echo "OCURRIO UN ERROR AL ENVIAR UN CORREO, FAVOR INTENTE EN UNOS MINUNTOS POR FAVOR, GRACIAS. ".$e->getMessage();
                exit();
            }
        }

        /**
         * Metodo para generacion de Formulario de registro de usuario
         */
        public function getRegistrationForm($entityManager, $user)
        {
            $builder = new DoctrineAnnotationBuilder($entityManager);
            $form = $builder->createForm($user);
            $form->setHydrator(new DoctrineHydrator($entityManager, 'Application\Entity\Usuario'));
            $filter = $form->getInputFilter();
            $form->remove('usrlId');
            $form->remove('lngId');
            $form->remove('usrActive');
            $form->remove('usrQuestion');
            $form->remove('usrAnswer');
            $form->remove('usrPicture');
            $form->remove('usrPasswordSalt');
            $form->remove('usrRegistrationDate');
            $form->remove('usrRegistrationToken');
            $form->remove('usrEmailConfirmed');

            // ... A lot of work of manually building the form

            $form->add(array(
                'name' => 'usrPasswordConfirm',
                'attributes' => array(
                    'type' => 'password',
                ),
                'options' => array(
                    'label' => 'Confirm Password',
                ),
            ));

            $form->add(array(
                'type' => 'Zend\Form\Element\Captcha',
                'name' => 'captcha',
                'options' => array(
                    'label' => 'Please verify you are human',
                    'captcha' => new \Zend\Captcha\Figlet(),
                ),
            ));

            $send = new Element('submit');
            $send->setValue('Register'); // submit
            $send->setAttributes(array(
                'type' => 'submit'
            ));
            $form->add($send);
            // ...
            return $form;
        }
    }