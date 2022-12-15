<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documents
 *
 * @ORM\Table(name="documents", indexes={@ORM\Index(name="fk_pat_doc", columns={"ID_Patient"})})
 * @ORM\Entity
 */
class Documents
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Document", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDocument;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_Patient", type="integer", nullable=true)
     */
    private $idPatient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Chemin", type="string", length=100, nullable=true)
     */
    private $chemin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nature", type="string", length=50, nullable=true)
     */
    private $nature;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Extension", type="string", length=3, nullable=true)
     */
    private $extension;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Date_ajout", type="date", nullable=true)
     */
    private $dateAjout;

    public function getIdDocument(): ?int
    {
        return $this->idDocument;
    }

    public function getIdPatient(): ?int
    {
        return $this->idPatient;
    }

    public function setIdPatient(?int $idPatient): self
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    public function getChemin(): ?string
    {
        return $this->chemin;
    }

    public function setChemin(?string $chemin): self
    {
        $this->chemin = $chemin;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(?\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }


}
