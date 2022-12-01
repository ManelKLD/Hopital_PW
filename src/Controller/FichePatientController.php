<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FichePatientController extends AbstractController
{
    /**
     * @Route("/fiche/patient", name="app_fiche_patient")
     */
    public function index(): Response
    {
        return $this->render('fiche_patient/index.html.twig', []);
    }
}
