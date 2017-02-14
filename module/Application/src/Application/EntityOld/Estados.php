<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estados
 *
 * @ORM\Table(name="estados")
 * @ORM\Entity
 */
class Estados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estados_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=5, nullable=false)
     */
    private $sigla;


    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=true)
     */
    private $descripcion;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

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
     * @return Estados
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get estadoId
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sigla
     *
     * @param string $sigla
     * @return Estados
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

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Estados
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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