<?php
namespace Application\Entity\Repositories;

//use Application\Helpers\Logger;
//use MisLibrerias\DatosSesion;

use MisLibrerias\DatosSesion;

class GestionPeriodoRepository extends BaseEntityRepository
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


    public function saveData($formData)
    {
        try {
            $this->em->beginTransaction();

            if ($formData['id_gp'] == '0') {

                $data = new \Application\Entity\GestionPeriodo();

                $data->setGestion($formData['gestion']);
                $data->setPeriodo($formData['periodo']);
                $data->setDescripcion($formData['descripcion']);
                $data->setEstado($formData['estado']);
                $data->setVigencia($formData['vigencia']);
                $data->setFechaIni(new \DateTime($formData['fecha_ini']));
                $data->setFechaFin(new \DateTime($formData['fecha_fin']));


            } else {

                $data = $this->em->getRepository('Application\Entity\GestionPeriodo')->find($formData['id_gp']);
                $data->setGestion($formData['gestion']);
                $data->setPeriodo($formData['periodo']);
                $data->setDescripcion($formData['descripcion']);
                $data->setEstado($formData['estado']);
                $data->setVigencia($formData['vigencia']);
                $data->setFechaIni(new \DateTime($formData['fecha_ini']));
                $data->setFechaFin(new \DateTime($formData['fecha_fin']));

            }

            $data->setPaFechaHora(new \DateTime());
            $data->setPaUsuario(DatosSesion::getLoginUsuario());
            $data->setPaEstacion(DatosSesion::getEstacion());

            $this->em->persist($data);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                "respuesta" => true,
                "mensaje" => "SE REGISTRARON CORRECTAMENTE LOS DATOS.",
               // "idParametro" => $data->getIdGp(),

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


    public function cambiaVigencia($erid)
    {
        try {

            $this->em->beginTransaction();

            $dato_P = $this->em->getRepository('Application\Entity\GestionPeriodo')->find($erid);

            $estado = $dato_P->getVigencia();
            if ($estado == 'V') {

                $dato_P->setVigencia('N');
            } else {

                $dato_P->setVigencia('V');
            }

            $dato_P->setPaFechaHora(new \DateTime());
            $dato_P->setPaUsuario(DatosSesion::getLoginUsuario());
            $dato_P->setPaEstacion(DatosSesion::getEstacion());

            $this->em->persist($dato_P);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                "respuesta" => true, "mensaje" => "SE CAMBIO LA VIGENCIA CORRECTAMENTE"
            );

        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();
            return $response = array(
                "respuesta" => false, "mensaje" => "ERROR AL CAMBIAR VIGENCIA" . $e
            );

        }


    }


}
