<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Actividades
 *
 * @ORM\Table(name="actividades")
 * @ORM\Entity
 */
class Actividades
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_actividad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActividad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Protocolos", inversedBy="idActividad")
     * @ORM\JoinTable(name="actividades_protocolos",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_actividad", referencedColumnName="id_actividad")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_protocolo", referencedColumnName="id_protocolo")
     *   }
     * )
     */
    private $idProtocolo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProtocolo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdActividad(): ?int
    {
        return $this->idActividad;
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

    /**
     * @return Collection|Protocolos[]
     */
    public function getIdProtocolo(): Collection
    {
        return $this->idProtocolo;
    }

    public function addIdProtocolo(Protocolos $idProtocolo): self
    {
        if (!$this->idProtocolo->contains($idProtocolo)) {
            $this->idProtocolo[] = $idProtocolo;
        }

        return $this;
    }

    public function removeIdProtocolo(Protocolos $idProtocolo): self
    {
        $this->idProtocolo->removeElement($idProtocolo);

        return $this;
    }

}
