<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sexe
 *
 * @ORM\Table(name="sexe")
 * @ORM\Entity
 */
class Sexe
{
    /**
     * @var string
     *
     * @ORM\Column(name="Code", type="string", length=1, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=30, nullable=false)
     */
    private $libelle;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


}
