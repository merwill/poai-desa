<?php
namespace MisLibrerias;

use Application\Entity\Repositories\EstructuraOrganizacionalRepository;
use Zend\Authentication\AuthenticationService;
use Zend\Session\Container;

class DatosSesion
{

    static function getPerfiles()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["lista_perfiles"])) {

            $option = "<ul>";
            foreach ($session->datos_sesion["lista_perfiles"] as $id => $perfil) {
                $option .= "<li>" . $id . "</li>";
            }
            $option .= "</ul>";
            return $option;
        } else {
            return "";
        }
    }

    static function getListaRoles()
    {

        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["lista_perfiles"])) {
            return $session->datos_sesion["lista_perfiles"];
        } else {
            return array();
        }
    }

    public static function getRol()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["id_rol"])) {
            return $session->datos_sesion["id_rol"];
        } else {
            return "";
        }
    }

    static function getPerfil()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["nombre_rol"])) {
            return $session->datos_sesion["nombre_rol"];
        } else {
            return "";
        }
    }

    static function getNombreRol()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["nombre_rol"])) {
            return $session->datos_sesion["nombre_rol"];
        } else {
            return "";
        }
    }

    static function getSiglaPerfil()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["sigla_rol"])) {
            return $session->datos_sesion["sigla_rol"];
        } else {
            return "";
        }
    }

    static function getSiglaAplicacion()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["sigla_aplicacion"])) {
            return $session->datos_sesion["sigla_aplicacion"];
        } else {
            return "";
        }
    }

    static function getAplicacion()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["nombre_aplicacion"])) {
            return $session->datos_sesion["nombre_aplicacion"];
        } else {
            return "";
        }
    }

    static function getUrlAplicacion()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["url"])) {
            return $session->datos_sesion["url"];
        } else {
            return "";
        }
    }

    static function getIdUsuario()
    {

        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["id_usuario"])) {
            return $session->datos_sesion["id_usuario"];
        } else {
            return "0";
        }
    }

    static function getMailUsuario()
    {

        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["mail_usuario"])) {
            return $session->datos_sesion["mail_usuario"];
        } else {
            return "";
        }
    }

    static function getLoginUsuario()
    {

        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["login_usuario"])) {
            return $session->datos_sesion["login_usuario"];
        } else {
            return "";
        }
    }

    static function getNombreUsuario()
    {
        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["nombre_usuario"])) {
            return $session->datos_sesion["nombre_usuario"];
        } else {
            return "";
        }
    }

    static function getCargo()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["cargo"])) {
            return $session->datos_sesion["cargo"];
        } else {
            return "";
        }
    }

    static function getPuesto()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["puesto"])) {
            return $session->datos_sesion["puesto"];
        } else {
            return "";
        }
    }

    static function getNombreEntidad()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["nombre_entidad"])) {
            return $session->datos_sesion["nombre_entidad"];
        } else {
            return "";
        }
    }

    static function getSiglaEntidad()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["sigla_entidad"])) {
            return $session->datos_sesion["sigla_entidad"];
        } else {
            return "";
        }
    }

    static function getUnidad()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["unidad_organizacional"])) {
            return $session->datos_sesion["unidad_organizacional"];
        } else {
            return "0";
        }
    }

    static function getNombreUnidadPOAPPTO($mostrarSinNivel = true)
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["unidad_organizacional_nombre_poa_ppto"])) {

            if ($mostrarSinNivel) {
                $retorno = trim(
                    $session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["descripcion"]
                );

            } else {
                $retorno = "[" . $session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["sigla"]
                    . "] " . trim(
                        $session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["descripcion"]
                    ) . "<br/>" . " [Nivel: "
                    . $session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["nivel"] . "] " . " ["
                    . trim($session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["id_unidad"])
                    . "]";
            }

        } else {
            return false;
        }

        return $retorno;
    }

    static function getNivelUnidad()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["unidad_organizacional_nombre_poa_ppto"])) {

            return $session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["nivel"];

        } else {
            return false;
        }
    }

    static function getNombreUnidad()
    {
        $session = new Container('datos_sesion');

        if (isset($session->datos_sesion["unidad_organizacional_nombre"])) {
            return $session->datos_sesion["unidad_organizacional_nombre"];
        } else {
            return "";
        }
    }

    static function getSiglaUnidad()
    {
        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["unidad_organizacional_nombre_poa_ppto"])) {
            return trim($session->datos_sesion["unidad_organizacional_nombre_poa_ppto"]["sigla"]);
        } else {
            return "";
        }
    }

    static function getIdEntidad()
    {
        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["id_entidad"])) {
            return $session->datos_sesion["id_entidad"];
        } else {
            return "0";
        }

    }

    static function getPersonaData($index = 'id_persona')
    {
        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["personaData"][$index])) {
            return $session->datos_sesion["personaData"][$index];
        } else {
            return null;
        }

    }

    static function getFechaHoy()
    {
        $format = 'd-m-Y';
        $date = \DateTime::createFromFormat($format, date("d-m-Y"));
        return $date->format('d-m-Y');

    }


    static function getEstacion()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $_SERVER['REMOTE_ADDR'];
    }

    static function getRemember()
    {

        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["rememberme"])) {
            return $session->datos_sesion["rememberme"];
        } else {
            return false;
        }
    }

    static function getIdSubEntidad()
    {
        $session = new Container('datos_sesion');
        if (isset($session->datos_sesion["id_entidad"])) {
            return $session->datos_sesion["id_entidad"];
        } else {
            return "0";
        }
    }

    static function getEstadoColorLabel($estado)
    {

        $tipo = "";
        if ($estado == 'F') {
            $tipo = "yellow";
        } elseif ($estado == 'S') {
            $tipo = "blue";
        } elseif ($estado == 'E') {
            $tipo = "purple";
        } elseif ($estado == 'C') {
            $tipo = "green";
        } else {
            $tipo = "";
        }

        return $tipo;
    }

    static function getEstadoDescripcion($estado)
    {

        $tipo = "";
        if ($estado == 'F') {
            $tipo = "FORMULACION";
        } elseif ($estado == 'S') {
            $tipo = "SEGUIMIENTO";
        } elseif ($estado == 'E') {
            $tipo = "EVALUACION";
        } elseif ($estado == 'C') {
            $tipo = "CERRADO";
        } else {
            $tipo = "NO DEFINIDO";
        }

        return $tipo;
    }

    static function getVigenciaColorLabel($vigencia)
    {

        $tipo = "";
        if ($vigencia == 'V') {
            $tipo = "green";
        } elseif ($vigencia == 'N') {
            $tipo = "red";
        } else {
            $tipo = "";
        }

        return $tipo;
    }

    static function getVigenciaDescripcion($vigencia)
    {

        $tipo = "";
        if ($vigencia == 'V') {
            $tipo = "VIGENTE";
        } elseif ($vigencia == 'N') {
            $tipo = "SUSPENDIDO";
        } else {
            $tipo = "NO DEFINIDO";
        }

        return $tipo;
    }


    static function debugIntoFirebug($dataArray, \Zend\Mvc\MvcEvent $e)
    {

        $dataToJson = json_encode($dataArray);

        //$display = "bootbox.alert(".$dataToJson.");console.info(".$dataToJson.")";
        $display = "console.info(" . $dataToJson . ");";
        //echo $display;
        $serviceManager = $e->getApplication()->getServiceManager();
        $serviceManager->get('viewhelpermanager')->get('inlineScript')->appendScript('' . $display . '');

        //echo $display;
        //return $display;
        //  echo "<script>console.log(".$dataToJson.")</script>";
    }

    static function debugErrorIntoFirebug($dataArray, \Zend\Mvc\MvcEvent $e)
    {

        $dataToJson = json_encode($dataArray);

        $display = "bootbox.alert(" . $dataToJson . ");console.info(" . $dataToJson . ")";
        //$display = "console.info(".$dataToJson.");";
        $serviceManager = $e->getApplication()->getServiceManager();
        $serviceManager->get('viewhelpermanager')->get('inlineScript')->appendScript('' . $display . '');

    }

    static function printTableHtml($dataArray = array(), $widthTable = '100', $widthCol = '35',
                                   $alignValue = "left"
    )
    {

        $html = "<table width='" . $widthTable
            . "%' class='table-bordered' style='border-spacing: 0;border-collapse: collapse;' ><tbody>";
        foreach ($dataArray as $titulo => $valor) {
            $html .= "<tr>" . "<th width='" . $widthCol
                . "%' class='text-left text-info' valign='top' style='padding: 1px;'>" . $titulo . "</th>"
                . "<td class='text-" . $alignValue . "' valign='top' style='padding: 1px;'>" . $valor
                . "</td>" . "</tr>";
        }
        $html .= "</tbody></table>";

        return $html;
    }


    static function getVigenciaNombre($cveVigencia)
    {

        $tipo = "";
        if ($cveVigencia == 'V') {
            $tipo = "VIGENTE";
        } elseif ($cveVigencia == 'S') {
            $tipo = "SUSPENDIDO";
        } elseif ($cveVigencia == 'E') {
            $tipo = "ELIMINADO";
        } else {
            $tipo = "NO DEFINIDO";
        }

        return $tipo;
    }

    static function getVigenciaColor($cveVigencia)
    {

        $tipo = "";
        if ($cveVigencia == 'V') {
            $tipo = "label-success";
        } elseif ($cveVigencia == 'S') {
            $tipo = "label-warning";
        } elseif ($cveVigencia == 'E') {
            $tipo = "label-danger";
        } else {
            $tipo = "label-default";
        }

        return $tipo;
    }

    static function getUrlServidorReportes($param)
    {
        $configIni = new \Zend\Config\Reader\Ini();
        $config = $configIni->fromFile(getcwd() . "/config/config-general.ini");

        $retorno = "";
        switch ($param) {
        case "url":
            $retorno = $config['con_serv_reportes']['url'];
            break;
        case "usuario":
            $retorno = $config['con_serv_reportes']['usuario'];
            break;
        case "clave":
            $retorno = $config['con_serv_reportes']['clave'];
            break;
        }

        return $retorno;
    }

    static function getNombreUnidadEjecutora()
    {
        $sessionAcciones = new Container('datos_sesion');
        if (isset($sessionAcciones->datos_sesion['unidad_ejecutora'])) {
            return $sessionAcciones->datos_sesion['unidad_ejecutora']['denominacion'];
        } else {
            return "";
        }
    }

    static function getSiglaUnidadEjecutora()
    {
        $sessionAcciones = new Container('datos_sesion');
        if (isset($sessionAcciones->datos_sesion['unidad_ejecutora'])) {
            return $sessionAcciones->datos_sesion['unidad_ejecutora']['sigla'];
        } else {
            return "";
        }
    }
}

?>