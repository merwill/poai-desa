<?php

namespace AuthDoctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table(name="seguridad.perfil")
 * @ORM\Entity
 */
class Perfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="perfil_id_rol_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_aplicacion", type="integer", nullable=true)
     */
    private $idAplicacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;


    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=100, nullable=true)
     */
    private $sigla;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Perfil
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idAplicacion
     *
     * @param integer $idAplicacion
     * @return Perfil
     */
    public function setIdAplicacion($idAplicacion)
    {
        $this->idAplicacion = $idAplicacion;
    
        return $this;
    }

    /**
     * Get idAplicacion
     *
     * @return integer 
     */
    public function getIdAplicacion()
    {
        return $this->idAplicacion;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return Perfil
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    
        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Perfil
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    /**
     * Set sigla
     *
     * @param string $sigla
     * @return Perfil
     */
    public function setSigla($sigla)
    {
    	$this->sigla = $sigla;
    
    	return $this;
    }
    
    /**
     * Get sigla
     *
     * @return string
     */
    public function getSigla()
    {
    	return $this->sigla;
    }
    
}