<?php

namespace Application\Entity\Repositories;

use Doctrine\ORM\Query;
use MisLibrerias\DatosSesion;
use Zend\Debug\Debug;

class CoreTablasParametricasRepository extends BaseEntityRepository
{
    public function findOrdenarPorNombre()
    {
        try {
            $query = $this->em->createQuery('SELECT p FROM \Application\Entity\CoreTablasParametricas p ORDER BY p.nombre ASC');
            $result = $query->getResult();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception('Ocurrio un error al Consultar. '.$e);

            return false;
        }
    }
    /*
     * id : ID de la tabla parametrica a eliminar
     * clase_id : ID de la clase parametrica
     */
    public function remove($id, $clase_id)
    {
        try {
            $this->em->beginTransaction();
            $tabla = $this->em->getRepository('Application\Entity\CoreTablasParametricas')->find($clase_id);
            $claseEntity = 'Application\\Entity\\'.$tabla->getClase();
            $dato = $this->em->getRepository($claseEntity)->find($id);
            $this->em->remove($dato);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                'respuesta' => true,
                'mensaje' => 'SE ELIMINÓ CORRECTAMENTE EL REGISTRO',
                'id' => $clase_id,
            );
        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();

            return $response = array(
                'respuesta' => false,
                'mensaje' => 'ERROR AL ELIMINAR EL REGISTRO.'.$e->getMessage(),
                'id' => $clase_id,
            );
        }
    }

    public function changestate($id, $clase_id)
    {
        try {
            $this->em->beginTransaction();
            $tabla = $this->em->getRepository('Application\Entity\CoreTablasParametricas')->find($clase_id);
            $claseEntity = 'Application\\Entity\\'.$tabla->getClase();
            $data = $this->em->getRepository($claseEntity)->find($id);
            if ($data->getEstado() == '1') {
                $data->setEstado('0');
            } else {
                $data->setEstado('1');
            }
            //Pistas de Auditoria
            $data->setCodUsuario(DatosSesion::getLoginUsuario().' ('.DatosSesion::getIdUsuario().')');
            $data->setFechaHora(new \DateTime());
            $data->setEstacion(DatosSesion::getEstacion());

            $this->em->persist($data);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                'respuesta' => true,
                'mensaje' => 'SE CAMBIO EL ESTADO CORRECTAMENTE',
                'id' => $clase_id,
            );
        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();

            return $response = array(
                'respuesta' => false,
                'mensaje' => 'ERROR AL CAMBIAR DE ESTADO. <br/>'.$e->getMessage(),
                'id' => $clase_id,
            );
        }
    }

    public function saveDataOld($formData, $clase)
    {
        $claseRepository = 'Application\\Entity\\Repositories\\'.$clase.'Repository';
        $SaveDataRepository = new $claseRepository($this->em);

        return $respuesta = $SaveDataRepository->saveData($formData);
    }

    public function saveData($formData, $clase, $idClase)
    {
        $claseRepository = 'Application\\Entity\\Repositories\\'.$clase.'Repository';
       // $SaveDataRepository = new $claseRepository($this->em);
//Debug::dump($clase);
        try {
            $this->em->beginTransaction();

            $claseEntity = 'Application\\Entity\\'.$clase;
            $tabla = $this->em->getRepository('Application\Entity\CoreTablasParametricas')->find($idClase);

            $data_Array = $tabla->getData();
            $data_Array = str_replace('get', 'set', $data_Array);
            $data_Array = str_replace('$value->', '', $data_Array);

            $data_Array = explode('|', $data_Array);

            if ($formData['id'] == '0' or $formData['id'] == '') {
                $data = new $claseEntity();
            } else {
                $data = $this->em->find($claseEntity, $formData['id']);
            }
            //Debug::dump($data_Array);
            $count = '1';
            foreach ($data_Array as $row) {
               // Debug::dump(strlen($row));
               // Debug::dump(((substr($row, 3,strlen($row)-6))));
                //Debug::dump($formData[strtolower(substr($row, 3,strlen($row)-6))]);
                if (isset($formData[strtolower(substr($row, 3, strlen($row) - 6))])) {
                    $datos = '$data->'.substr($row, 0, strlen($row) - 2).chr(39).$formData[strtolower(substr($row, 3, strlen($row) - 6))].chr(39).');';

                    eval($datos);

                }
            }

            //Pistas de Auditoria
            $data->setCodUsuario(DatosSesion::getLoginUsuario().' ('.DatosSesion::getIdUsuario().')');
            $data->setFechaHora(new \DateTime());
            $data->setEstacion(DatosSesion::getEstacion());

            $this->em->persist($data);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                'respuesta' => true,
                'mensaje' => 'SE REGISTRARON CORRECTAMENTE LOS DATOS.',
            );
        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();

            return $response = array(
                'respuesta' => false,
                'mensaje' => 'ERROR AL REGISTRAR LOS DATOS'.$e->getMessage(),
            );
        }

        //return $respuesta = $SaveDataRepository->saveData($formData);
    }

    public function getForm($id, $clase)
    {
        $claseEntity = 'Application\\Entity\\'.$clase;

        //$data = $this->em->find($claseEntity,$id);
        //$data = $this->em->getRepository($claseEntity)->findOneBy(array('id'=> $id));
        //$data = $data->getResult(Query::HYDRATE_ARRAY);
       // return $response = $data;

        try {
            $query = $this->em->createQuery('SELECT p FROM '.$claseEntity.' p WHERE p.id = :id');
            $query->setParameter('id', $id);
            $result = $query->getArrayResult();
            if ($result) {
                return $result[0];
            }
        } catch (\Exception $e) {
            throw new \Exception('Ocurrio un error al Consultar. '.$e);

            return false;
        }
    }
}
