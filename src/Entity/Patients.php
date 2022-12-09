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

    public function __toString()
    {
        return $this->nom; // Remplacer champ par une propriété "string" de l'entité
    }
}
