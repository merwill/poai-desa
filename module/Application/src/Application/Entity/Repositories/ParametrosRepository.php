<?php
namespace Application\Entity\Repositories;

//use Application\Helpers\Logger;
//use MisLibrerias\DatosSesion;

use MisLibrerias\DatosSesion;

class ParametrosRepository extends BaseEntityRepository
{

    public function getListaDatos()
    {
        $dql = '
                SELECT p.idParametro, p.sigla, p.descripcion, p.estado,p.orden, p.nivel,p.rutaAdjunto
                FROM \Application\Entity\Parametros p
                WHERE p.nivel = 1
                ORDER BY p.orden ASC';

        try {
            $query = $this->em->createQuery($dql);
            $result = $query->getResult();
            return $result;
        } catch (\Exception $e){
            return $response = array(
                "respuesta" => false,
                "mensaje" => "ERROR AL CONSULTAR LOS DATOS: ". $e
            );
        }

    }


    public function saveData($formData, $filename = "")
    {
        try {
            $this->em->beginTransaction();

            if ($formData['idParametro'] == '0') {

                $data = new \Application\Entity\Parametros();

                $entidad = $this->em->getRepository('Application\Entity\Parametros')->find(
                    $formData['idPadreParametro']
                );
                $data->setDescripcion($formData['descripcion']);
                $data->setSigla($formData['sigla']);
                $data->setEstado($formData['estado']);
                $data->setNivel($formData['nivel']);
                $data->setOrden($formData['orden']);
                $data->setIdPadreParametro($entidad);


            } else {

                $data = $this->em->getRepository('Application\Entity\Parametros')->find($formData['idParametro']);
                $entidad = $this->em->getRepository('Application\Entity\Parametros')->find($formData['idPadreParametro']);
                $data->setDescripcion($formData['descripcion']);
                $data->setSigla($formData['sigla']);
                $data->setEstado($formData['estado']);
                $data->setNivel($formData['nivel']);
                $data->setOrden($formData['orden']);
                $data->setIdPadreParametro($entidad);

            }

            if($filename != "") {
                $nombreArchivo = $filename; //$data->getIdParametro() . "_parametro.pdf";
                $data->setRutaAdjunto($nombreArchivo);
            }
            $data->setFechaHora(new \DateTime());
            $data->setCodUsuario(DatosSesion::getLoginUsuario());
            $data->setEstacion(DatosSesion::getEstacion());

            $this->em->persist($data);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                "respuesta" => true,
                "mensaje" => "SE REGISTRARON CORRECTAMENTE LOS DATOS.",
                "idParametro" => $data->getIdParametro(),

            );
        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();
            return $response = array(
                "respuesta" => false, "mensaje" => "ERROR AL REGISTRAR LOS DATOS: ".$e
            );
        }
    }

    public function saveArchivoAdjunto($id, $nameFilename){

        try {

            $this->em->beginTransaction ();

            $dql = "UPDATE Application\Entity\Parametros p SET
 						  p.rutaAdjunto = :rutaAdjunto
   		                  where p.idParametro = :id"	;
            $query = $this->em->createQuery ( $dql );
            $query->setParameters ( array (
                                        ':rutaAdjunto' => $nameFilename,
                                        ':id' => $id,
                                    ) );
            $result = $query->getArrayResult ();
            $this->em->flush();
            $this->em->commit();


            return $response = array (
                "respuesta" => true,
                "mensaje" => "SE GUARDO EL ARCHIVO CORRECTAMENTE"
            );

        } catch (\Exception $e) {
            $this->em->rollbackTransaction();
            $this->em->close();
            return $response = array(
                "respuesta" => false,
                "mensaje"	=> "ERROR AL GUARDAR ARCHIVO: ".$e
            );

        }
    }

    public function getForm($id)
    {

        $data = $this->em->getRepository('Application\Entity\Parametros')->find($id);

        return $response = array(
            "idParametro" => $data->getIdParametro() ,
            "idPadreParametro" => $data->getIdPadreParametro()->getIdParametro() ,
            "sigla" =>  $data->getSigla() ,
            "descripcion" =>  $data->getDescripcion() ,
            "estado" =>  $data->getEstado() ,
            "orden" =>  $data->getOrden() ,
            "nivel" =>  $data->getNivel() ,

        );

    }


    public function remove($id)
    {
        try {
            $this->em->beginTransaction();

            $data = $this->em->getRepository('Application\Entity\Parametros')->find($id);

            //$this->em->remove($dato);
            $data->setEstado(false);

            $data->setFechaHora(new \DateTime());
            $data->setCodUsuario(DatosSesion::getLoginUsuario());
            $data->setEstacion(DatosSesion::getEstacion());

            $this->em->persist($data);
            $this->em->flush();
            $this->em->commit();
            return $response = array(
                "respuesta" => true, "mensaje" => "SE ELIMINO CORRECTAMENTE EL REGISTRO",
            );
        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();
            return $response = array(
                "respuesta" => false, "mensaje" => "ERROR AL ELIMINAR EL REGISTRO." . $e,
            );
        }

    }


    public function cambiarestado($erid)
    {
        try {

            $this->em->beginTransaction();

            $dato_P = $this->em->getRepository('Application\Entity\Parametros')->find($erid);

            $estado = $dato_P->getEstado();
            if ($estado == false) {

                $dato_P->setEstado(true);
            } else {

                $dato_P->setEstado(false);
            }

            $dato_P->setFechaHora(new \DateTime());
            $dato_P->setCodUsuario(DatosSesion::getLoginUsuario());
            $dato_P->setEstacion(DatosSesion::getEstacion());

            $this->em->persist($dato_P);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                "respuesta" => true, "mensaje" => "SE CAMBIO EL ESTADO CORRECTAMENTE"
            );

        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();
            return $response = array(
                "respuesta" => false, "mensaje" => "ERROR AL CAMBIAR ESTADO" . $e
            );

        }


    }


}
