<?php
namespace Application\Entity\Repositories;

//use Application\Helpers\Logger;
//use MisLibrerias\DatosSesion;

class EntidadesRepository extends BaseEntityRepository
{

    public function saveData($formData)
    {
        try {
            $this->em->beginTransaction();

            if ($formData['entidad_id'] == '0') {

                $data = new \Application\Entity\Entidades();

                $entidad = $this->em->getRepository('Application\Entity\Entidades')->find(
                    $formData['dependencia_id']
                );
                $data->setNombre($formData['nombre']);
                $data->setDependencia($entidad);


            } else {

                $data = $this->em->getRepository('Application\Entity\Entidades')->find($formData['entidad_id']);
                $entidad = $this->em->getRepository('Application\Entity\Entidades')->find($formData['dependencia_id']);
                $data->setNombre($formData['nombre']);
                $data->setDependencia($entidad);

            }


            $this->em->persist($data);
            $this->em->flush();
            $this->em->commit();
            return $response = array(
                "respuesta" => true, "mensaje" => "SE REGISTRARON CORRECTAMENTE LOS DATOS.",
            );
        } catch (\Exception $e) {
            $this->em->rollback();
            $this->em->close();
            return $response = array(
                "respuesta" => false, "mensaje" => "ERROR AL REGISTRAR LOS DATOS"
            );
        }
    }

    public function getForm($id)
    {

        $data = $this->em->getRepository('Application\Entity\Entidades')->find($id);

        return $response = array(
            "entidadId"   => $data->getEntidadId(),
            "nombre" => $data->getNombre(),
            "dependencia" => $data->getDependencia()->getNombre(),

        );

    }


    public function remove($id)
    {
        try {
            $this->em->beginTransaction();

            $dato = $this->em->getRepository('Application\Entity\Entidades')->find($id);

            $this->em->remove($dato);

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

            $dato_P = $this->em->getRepository('Application\Entity\Entidades')->find($erid);

            $estado = $dato_P->getErActivo();
            if ($estado == '0') {

                $dato_P->setErActivo('1');
            } else {

                $dato_P->setErActivo('0');
            }

            $dato_P->setErUpdsysfecha(new \DateTime());
            $dato_P->setErUpdsysusr(DatosSesion::getLoginUsuario());
            $dato_P->setErUpdestacion(DatosSesion::getEstacion());

            $this->em->persist($dato_P);
            $this->em->flush();
            $this->em->commit();

            return $response = array(
                "respuesta" => true, "mensaje" => "SE CAMBIO EL ESTADO CORRECTAMENTE"
            );

        } catch (\Exception $e) {
            $this->em->rollbackTransaction();
            $this->em->close();
            return $response = array(
                "respuesta" => false, "mensaje" => "ERROR AL CAMBIAR ESTADO" . $e
            );

        }


    }


}
