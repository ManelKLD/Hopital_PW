<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motifs
 *
 * @ORM\Table(name="motifs")
 * @ORM\Entity
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


}
