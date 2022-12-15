<?php

namespace App\Form;


use App\Entity\Patients;
use App\Entity\Documents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\CallbackTransformer;

class UploadDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('document', FileType::class, [
                'label' => 'Brochure (PDF file)',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '5120k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpg',
                            'image/png',
                            'image/svg+xml',
                            'image/webp',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner le document au format valide',
                    ])
                ],
            ])

            ->add('idPatient', ChoiceType::class, [
                'required' => true,
                'mapped' => true,
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                ]

            ])

            // ->add('idPatient', EntityType::class, [
            //     'class' => Patients::class,
            //     'required' => true,
            //     'mapped' => false,
            //     'query_builder' => function (EntityRepository $er) {
            //         return $er->createQueryBuilder('pa')
            //             ->orderBy('pa.code', 'ASC');
            //     },
            //     //'choice_label' => 'nom',
            //     'choice_label' => 'code',
            //     'required' => true,
            //     'placeholder' => '...'
            // ])

            ->add('nature', TextType::class, [
                'required' => true,
                'mapped' => true,
            ])

            // ->add('Extensions', TextType::class, [
            //     'required' => true,
            // ])

            ->add('dateAjout', DateType::class, [
                'label' => 'Date',
                'required' => false,
                'html5' => false
            ])

            // ->add('Date', DateType::class, [
            //     'required' => true,
            // ])

            // ...

            ->get('dateAjout')->addModelTransformer(new CallbackTransformer(
                function ($value) {
                    if (!$value) {
                        return new \DateTime();
                    }
                    return $value;
                },
                function ($value) {
                    return $value;
                }
            ));

        $dateinsertion = date("d-m-Y");
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Documents::class,
        ]);
    }
}
