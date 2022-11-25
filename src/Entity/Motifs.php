<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MotifsRepository;

/**
 * Motifs
 *
 * @ORM\Table(name="motifs")
 * @ORM\Entity(repositoryClass="App\Repository\MotifsRepository")
 */
class Motifs
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code", type="integer", nullable=false)
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

    public function getCode(): ?int
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
