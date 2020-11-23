<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiembrosProyectos
 *
 * @ORM\Table(name="miembros_proyectos")
 * @ORM\Entity
 */
class MiembrosProyectos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_miembro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMiembro;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    public function getIdMiembro(): ?int
    {
        return $this->idMiembro;
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


}
