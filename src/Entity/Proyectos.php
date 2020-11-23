<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyectos
 *
 * @ORM\Table(name="proyectos", indexes={@ORM\Index(name="proyecto_responsable", columns={"id_responsable"})})
 * @ORM\Entity
 */
class Proyectos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_proyecto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     */
    private $fechaFin;

    /**
     * @var \MiembrosProyectos
     *
     * @ORM\ManyToOne(targetEntity="MiembrosProyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_responsable", referencedColumnName="id_miembro")
     * })
     */
    private $idResponsable;

    public function getIdProyecto(): ?int
    {
        return $this->idProyecto;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    public function getIdResponsable(): ?MiembrosProyectos
    {
        return $this->idResponsable;
    }

    public function setIdResponsable(?MiembrosProyectos $idResponsable): self
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }


}
