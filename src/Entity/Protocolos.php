<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Protocolos
 *
 * @ORM\Table(name="protocolos", indexes={@ORM\Index(name="protocolo_responsable", columns={"id_responsable"}), @ORM\Index(name="protocolo_proyecto", columns={"id_proyecto"})})
 * @ORM\Entity
 */
class Protocolos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_protocolo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProtocolo;

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
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_local", type="boolean", nullable=false)
     */
    private $esLocal;

    /**
     * @var int
     *
     * @ORM\Column(name="puntaje", type="integer", nullable=false)
     */
    private $puntaje;

    /**
     * @var \Proyectos
     *
     * @ORM\ManyToOne(targetEntity="Proyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proyecto", referencedColumnName="id_proyecto")
     * })
     */
    private $idProyecto;

    /**
     * @var \MiembrosProyectos
     *
     * @ORM\ManyToOne(targetEntity="MiembrosProyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_responsable", referencedColumnName="id_miembro")
     * })
     */
    private $idResponsable;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actividades", mappedBy="idProtocolo")
     */
    private $idActividad;

    private $idTarea;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idActividad = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdProtocolo(): ?int
    {
        return $this->idProtocolo;
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

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getEsLocal(): ?bool
    {
        return $this->esLocal;
    }

    public function setEsLocal(bool $esLocal): self
    {
        $this->esLocal = $esLocal;

        return $this;
    }

    public function getPuntaje(): ?int
    {
        return $this->puntaje;
    }

    public function setPuntaje(int $puntaje): self
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    public function getIdProyecto(): ?Proyectos
    {
        return $this->idProyecto;
    }

    public function setIdProyecto(?Proyectos $idProyecto): self
    {
        $this->idProyecto = $idProyecto;

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

    /**
     * @return Collection|Actividades[]
     */
    public function getIdActividad(): Collection
    {
        return $this->idActividad;
    }

    public function addIdActividad(Actividades $idActividad): self
    {
        if (!$this->idActividad->contains($idActividad)) {
            $this->idActividad[] = $idActividad;
            $idActividad->addIdProtocolo($this);
        }

        return $this;
    }

    public function removeIdActividad(Actividades $idActividad): self
    {
        if ($this->idActividad->removeElement($idActividad)) {
            $idActividad->removeIdProtocolo($this);
        }

        return $this;
    }

    public function setIdTarea($idTarea){
        $this->idTarea = $idTarea;

        return $this;
    }

    public function getIdTarea(){
        return $this->idTarea;
    }

}
