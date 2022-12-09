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
     * @var int
     *
     * @ORM\Column(name="ID_Patient", type="integer", nullable=false)
     */
    private $idPatient;

    /**
     * @var string
     *
     * @ORM\Column(name="Chemin", type="string", length=100, nullable=false)
     */
    private $chemin;

    /**
     * @var string
     *
     * @ORM\Column(name="Nature", type="string", length=15, nullable=true)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="Extension", type="string", length=3, nullable=false)
     */
    private $extension;
}
