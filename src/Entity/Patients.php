<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PatientsRepository;

/**
 * Patients
 *
 * @ORM\Table(name="patients", indexes={@ORM\Index(name="fk_pays", columns={"Code_Pays"}), @ORM\Index(name="fk_motif", columns={"Code_Motif"}), @ORM\Index(name="fk_sexe", columns={"Sexe"})})
 * @ORM\Entity (repositoryClass="App\Repository\PatientsRepository")
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naiss", type="date", nullable=false)
     */
    private $dateNaiss;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Num_Secu", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $numSecu = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="Code_Pays", type="string", length=2, nullable=false)
     */
    public $codePays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Entree", type="date", nullable=false)
     */
    private $dateEntree;

    /**
     * @var \int
     *
     * @ORM\ManyToOne(targetEntity="Motifs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Motif", referencedColumnName="Code")
     * })
     */
    private $codeMotif;

    /**
     * @var \string
     *
     * @ORM\ManyToOne(targetEntity="Sexe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Sexe", referencedColumnName="Code")
     * })
     */
    private $sexe;

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

    public function getCodeMotif(): ?int
    {
        return $this->codeMotif;
    }

    public function setCodeMotif(?Motifs $codeMotif): self
    {
        $this->codeMotif = $codeMotif;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
}
