<?php

namespace Maiba\AlimentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Maiba\BaseBundle\Entity\Traits;

/**
 * Atributo
 *
 * @ORM\Table(name=protocolo")
 * @ORM\Entity
 *
 * @Gedmo\SoftDeleteable(fieldName="fechaBaja")
 *
 */
class Atributo {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

}