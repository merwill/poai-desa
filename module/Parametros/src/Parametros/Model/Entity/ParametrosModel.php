<?php
namespace Parametros\Model\Entity;

use MisLibrerias\DatosSesion;
use Zend\Db\TableGateway\TableGateway;

/*
* Usamos el componente Dd\Adapter que nos permite hacer consultas
* convencionales en formato SQL as� como para servir de conexi�n 
* para el componente SQL que nos provee de una capa de abstracci�n
* mas potente que la que da tablagateway
*/
use Zend\Db\Adapter\Adapter;

/*
Usamos el componente SQL que nos permite realizar consultas
utilizando m�todos.
*/
use Zend\Db\Sql\Sql;

/*
Igual que el anterior pero solamente con la cl�usula select
*/
use Zend\Db\Sql\Select;

/*
* Nos da algunas herramientas para trabajar con el resulset de las consultas, puede ser prescindible
*/
use Zend\Db\ResultSet\ResultSet;

class ParametrosModel extends TableGateway
{
    private $dbAdapter;

    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        //Conseguimos el adaptador
        $this->dbAdapter = $adapter;
        return parent::__construct('parametro', $this->dbAdapter, $databaseSchema, $selectResultPrototype);
    }

    //CREAMOS LOS METODOS DEL MODELO PARA EL CRUD

    public function getParametros()
    {
        $sql = "
              SELECT p.id,tp.tipoparametro,p.parametro
              FROM tipoparametro tp
              INNER JOIN parametro p ON tp.id=p.tipoparametro
              ORDER BY tp.tipoparametro, p.parametro";
        try {
            $consulta = $this->dbAdapter->query($sql, Adapter::QUERY_MODE_EXECUTE);
            $datos = $consulta->toArray();
            return $datos;
        } catch (\Exception $e) {
            \MisLibrerias\DatosSesion::showErrorException($e);
        }
    }

    public function getUnParametro($id)
    {
        try {
            $sql = new Sql($this->dbAdapter);
            $select = $sql->select();
            $select->columns(array('id', 'parametro', 'tipoparametro'))
                ->from('parametro')
                ->where(array('id' => $id));
            $selectString = $sql->getSqlStringForSqlObject($select);
            $execute = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
            $result = $execute->toArray();
            //print_r($result);
            return $result[0];
        } catch (\Exception $e) {
            \MisLibrerias\DatosSesion::showErrorException($e);
        }
    }

    public function getParametro()
    {
        try {
            $consulta = $this->dbAdapter->query("SELECT id,tipoparametro FROM tipoparametro Order BY tipoparametro", Adapter::QUERY_MODE_EXECUTE);
            $datos = $consulta->toArray();
            $vector = array();
            $c = 0;
            foreach ($datos as $aux) {
                $vector[$datos[$c]["id"]] = $datos[$c]["tipoparametro"];
                $c++;
            }
            return $vector;
        } catch (\Exception $e) {
            \MisLibrerias\DatosSesion::showErrorException($e);
        }
    }

    public function addParametro($param, $tipoparametro)
    {
        try {
            $consulta = $this->dbAdapter->query("SELECT count(parametro) as count FROM parametro WHERE parametro='$param'", Adapter::QUERY_MODE_EXECUTE);
            $datos = $consulta->toArray();
            if ($datos[0]["count"] == 0) {

                $consulta = $this->dbAdapter->query("SELECT max(id) as max FROM parametro", Adapter::QUERY_MODE_EXECUTE);
                $datos = $consulta->toArray();
                $max = $datos[0]["max"] + 1;
                $insert = $this->insert(array("id" => $max,"parametro" => $param, "tipoparametro" => $tipoparametro));
            } else {
                $insert = false;
            }
            return $insert;
        } catch (\Exception $e) {
            \MisLibrerias\DatosSesion::showErrorException($e);
           //exit();
        }
    }

    public function updateParametro($id, $param)
    {
        try {
            $update = $this->update((array("parametro" => $param)), array("id" => $id));
            return $update;
        } catch (\Exception $e) {
            \MisLibrerias\DatosSesion::showErrorException($e);
        }
    }
}