<?php
namespace MisLibrerias;

class Logger
{
    //protected static $logger;
    public function init()
    {
        //self::$logger = Zend_Registry::get("logger");
    }

    public static function logIntoFirebug($arg, $tipo = "debug")
    {

        $logger = \Zend_Registry::get("logger");
        $logger->log($arg, $tipo);

    }

    public static function showDialogError($error)
    {
        echo \YsJQuery::newInstance()->execute("dialogOpen('" . $error . "','ERROR');"
        //"alert('".$error."');"
        );

    }

    public static function showErrorDoctrine($texto, \Exception $e)
    {

        // 		$request = new \Zend_Controller_Request_Simple();
        // 		$request->setModuleName("default");
        // 		$request->setControllerName("error");
        // 		$request->setActionName("error-doctrine");

        //Logger::logIntoFirebug($e);

        //$error = $e->getTraceAsString();
        $error = $e->getMessage();

        throw new \Exception($texto . "<br> " . $error);

// 		$error = $e->getMessage();
// 		$redirect = new \Zend_Controller_Action_Helper_Redirector();
// 		//$r->gotoSimpleAndExit("error-doctrine","error","default");
// 		$redirect->gotoUrl('/default/error/error-doctrine/texto/'.$texto.'/error_handler/'.$error)->redirectAndExit();
    }

    public static function showDialog($mensaje)
    {

        \YsJQuery::usePlugin(\YsJQueryConstant::PLUGIN_PNOTYFY);

        echo \YsJQuery::newInstance()->execute(
            new \YsJsFunction(
                \YsPNotify::build(
                    array(
                        'pnotify_text' => $mensaje, 'pnotify_type' => \YsPnotify::NOTICE_TYPE
                    )
                )
            )
        );
    }


}

?>