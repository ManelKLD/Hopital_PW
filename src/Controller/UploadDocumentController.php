<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Documents;
use App\Form\UploadDocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class UploadDocumentController extends AbstractController
{
    /**
     * @Route("/upload/document", name="app_upload_document")
     */
    public function new(Request $request): Response
    {


        $document = new Documents();
        $form = $this->createForm(UploadDocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $docFile = $form->get('document')->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();


            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($docFile) {
                $originalFilename = pathinfo($docFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $docFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $docFile->move(
                        $this->getParameter('documents_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }
        }

        return $this->render('upload_document/index.html.twig', [
            'controller_name' => 'UploadDocumentController',
            'form' => $form->createView(),
        ]);
    }
}
