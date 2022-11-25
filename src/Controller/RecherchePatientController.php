<?php

namespace App\Controller;


use App\Form\RecherchePatientType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PatientsRepository;
use App\Entity\Patients;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecherchePatientController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/rp", name="app_recherche_patient")
     */
    public function index(Request $request, PatientsRepository $patientsRepository)
    {

        date_default_timezone_set('Europe/Paris');
        $dateAuj = date('d/m/Y');
        // echo $dateAuj;

        //peremet de renvoyer la vue de notre formulaire

        //créer une var form pour faire le lien avec le formulaire (Type) où il sera possible de l'instancier
        $form = $this->createForm(RecherchePatientType::class);


        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            //critère : recup les donnée du formulaire via la variable ci-dessus
            $FormData = $form->getData();
            //dd($FormData);
            //créé une var patient qui contient la fonction de recherche prenant en parametre les critères saisis

            $lespatients = $patientsRepository->trouverPatient($FormData);
            //dd($patient);
        }

        // Méthode findBy qui permet de récupérer les données avec des critères de filtre, ici aucun
        $liste_patients = $this->getDoctrine()->getRepository(Patients::class)->findBy([]);

        //Verifie que la variable existe
        //if (isset($lespatients)) {
        //    echo 'Cette variable existe, donc je peux l\'afficher.';
        //}

        return $this->render('recherche_patient/rp.html.twig', [
            'patients' => $lespatients,
            'dateAuj' => $dateAuj,
            'liste_patients' => $liste_patients,
            'recherche_form' => $form->createView()

        ]);
    }
}
