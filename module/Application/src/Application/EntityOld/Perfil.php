<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Mvc\MvcEvent;

/**
 * Perfil.
 *
 * @ORM\Table(name="crudadmin.perfil")
 * @ORM\Entity
 */
class Perfil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="crudadmin.perfil_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="id_aplicacion", type="integer", nullable=true)
     */
    private $idaplicacion;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var bool
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
     * @var string
     *
     * @ORM\Column(name="cod_usuario", type="string", length=100, nullable=true)
     */
    private $codUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true)
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="estacion", type="string", length=100, nullable=true)
     */
    private $estacion;

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return Perfil
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Perfil
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idAplicacion.
     *
     * @param int $idAplicacion
     *
     * @return Perfil
     */
    public function setIdaplicacion($idaplicacion)
    {
        $this->idaplicacion = $idaplicacion;

        return $this;
    }

    /**
     * Get idAplicacion.
     *
     * @return int
     */
    public function getIdaplicacion()
    {
        return $this->idaplicacion;
    }

    /**
     * Set orden.
     *
     * @param int $orden
     *
     * @return Perfil
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden.
     *
     * @return int
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set estado.
     *
     * @param bool $estado
     *
     * @return Perfil
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set sigla.
     *
     * @param string $sigla
     *
     * @return Perfil
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla.
     *
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set codUsuario.
     *
     * @param string $codUsuario
     *
     * @return Parametros
     */
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;

        return $this;
    }

    /**
     * Get codUsuario.
     *
     * @return string
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * Set fechaHora.
     *
     * @param \DateTime $fechaHora
     *
     * @return Parametros
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora.
     *
     * @return \DateTime
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set estacion.
     *
     * @param string $estacion
     *
     * @return Parametros
     */
    public function setEstacion($estacion)
    {
        $this->estacion = $estacion;

        return $this;
    }

    /**
     * Get estacion.
     *
     * @return string
     */
    public function getEstacion()
    {
        return $this->estacion;
    }
}
