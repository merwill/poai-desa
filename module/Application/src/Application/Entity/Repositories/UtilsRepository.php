<?php
namespace Application\Entity\Repositories;

/**
 *  UtilsRepository
 *  Ejecucion de consultas nativas SQL
 *
 * @author wilmer.alvarez
 */
class UtilsRepository extends BaseEntityRepository
{

    protected static $instance;

    /**
     * Ejecucion de consultas nativas
     *
     * @param string $sqlQuery
     *
     * @return array
     */
    public function execNativeSql($sqlQuery, $params = array())
    {
        try {

            $stmt = $this->em->getConnection()->prepare($sqlQuery);
            $stmt->execute($params);
            $result = $stmt->fetchAll();
            if ($result) {
                return $result;
            } else {
                return array();
            }
        } catch (\Exception $e) {
            //Logger::showErrorDoctrine("Error al ejecutar: execNativeSql",$e);
            //throw $e;
            return $e->getMessage();
        }
    }

    public function executeSql($sqlQuery, $params = array())
    {
        try {

            $stmt = $this->em->getConnection()->prepare($sqlQuery);
            $result = $stmt->execute($params);
            //$result = $stmt->fetchAll();
            if ($result) {
                return $result;
            } else {
                return array();
            }
        } catch (\Exception $e) {
            //Logger::showErrorDoctrine("Error al ejecutar: execNativeSql",$e);
            //throw $e;
            return $e->getMessage();
        }
    }

    /**
     * Obtiene datos Parametros generales del formulario
     *
     * @param string $formName
     *
     * @return array:
     */
    public function getFormularioParametros($formName)
    {
        try {
            //self::getInstance();

            $sqlQuery
                = "SELECT *
						 FROM crudadmin.core_formulario_parametros
						 WHERE form_name = '$formName'
						 AND estado = '1'";

            $formParametros = $this->execNativeSql($sqlQuery);

            if (isset($formParametros)) {
                return $formParametros[0];
            } else {
                return array();
            }

        } catch (\Exception $e) {
            //Logger::showErrorDoctrine("Error al ejecutar: getFormularioParametros",$e);
            throw $e;
        }
    }

    /**
     * Obtiene los objetos del formulario
     *
     * @param integer $formParamId
     *
     * @return array:
     */
    public function getFormularioObjetos($formParamId)
    {
        try {

            $sqlQuery
                = "SELECT *
						 FROM crudadmin.core_formulario_objetos
						 WHERE form_param_id = $formParamId 
						 AND estado = '1'
						 ORDER BY orden";

            $formObjetos = $this->execNativeSql($sqlQuery);

            return $formObjetos;

        } catch (\Exception $e) {
            //Logger::showErrorDoctrine("Error al ejecutar: getFormularioObjetos",$e);
            throw $e;
        }
    }

}
