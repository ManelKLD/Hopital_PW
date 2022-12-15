<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patients
 *
 * @ORM\Table(name="patients", indexes={@ORM\Index(name="fk_sexe", columns={"Sexe"}), @ORM\Index(name="fk_motifs", columns={"Code_Motif"}), @ORM\Index(name="fk_pays", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Patients
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
     * @ORM\Column(name="Nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexe", type="string", length=1, nullable=false)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naiss", type="date", nullable=false)
     */
    private $dateNaiss;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Num_Secu", type="string", length=15, nullable=true)
     */
    private $numSecu;

    /**
     * @var string
     *
     * @ORM\Column(name="Code_Pays", type="string", length=2, nullable=false)
     */
    private $codePays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Entree", type="date", nullable=false)
     */
    private $dateEntree;

    /**
     * @var string
     *
     * @ORM\Column(name="Code_Motif", type="string", length=1, nullable=false)
     */
    private $codeMotif;

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getNumSecu(): ?string
    {
        return $this->numSecu;
    }

    public function setNumSecu(?string $numSecu): self
    {
        $this->numSecu = $numSecu;

        return $this;
    }

    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    public function setCodePays(string $codePays): self
    {
        $this->codePays = $codePays;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getCodeMotif(): ?string
    {
        return $this->codeMotif;
    }

    public function setCodeMotif(string $codeMotif): self
    {
        $this->codeMotif = $codeMotif;

        return $this;
    }


}
