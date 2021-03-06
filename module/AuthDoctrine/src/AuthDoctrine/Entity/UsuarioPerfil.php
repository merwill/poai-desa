<?php

namespace AuthDoctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioPerfil
 *
 * @ORM\Table(name="seguridad.usuario_perfil")
 * @ORM\Entity
 */
class UsuarioPerfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuario_perfil_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_perfil", type="integer", nullable=true)
     */
    private $idPerfil;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_unidad", type="integer", nullable=true)
     */
    private $idUnidad;



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
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return UsuarioPerfil
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idPerfil
     *
     * @param integer $idPerfil
     * @return UsuarioPerfil
     */
    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
    
        return $this;
    }

    /**
     * Get idPerfil
     *
     * @return integer 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return UsuarioPerfil
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
     * Set idUnidad
     *
     * @param integer $idUnidad
     * @return UsuarioPerfil
     */
    public function setIdUnidad($idUnidad)
    {
        $this->idUnidad = $idUnidad;
    
        return $this;
    }

    /**
     * Get idUnidad
     *
     * @return integer 
     */
    public function getIdUnidad()
    {
        return $this->idUnidad;
    }
}