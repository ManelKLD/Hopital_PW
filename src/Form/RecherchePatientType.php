<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use App\Entity\Pays;
use App\Entity\Motifs;
use Doctrine\ORM\EntityRepository;


class RecherchePatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('Nom', TextType::class, [
                'required' => false,
            ]) //sans accent

            ->add('Pays', EntityType::class, [
                // looks for choices from this entity
                'class' => Pays::class,
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.libelle', 'ASC');
                },
                // 
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Indifférent'
            ])

            ->add('Motif', EntityType::class, [
                // looks for choices from this entity
                'class' => Motifs::class,
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.libelle', 'ASC');
                },
                // 
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Indifférent'
            ])

            ->add('Date', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                // 'placeholder' => [
                //     'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                //],
                'format' => 'yyyy-MM-dd',

            ])

            ->add('Rechercher', SubmitType::class, [
                'attr' => ['class' => 'btn btn-outline-dark', 'far icon' => 'paper-plane']
            ])

            //. \PHP_EOL .

            ->add('Vider', ResetType::class, [
                'attr' => ['class' => 'btn btn-outline-dark']
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // lien avec les donnée du formulaire
            //'data_class' => RecherchePatientType::class,
            //get permet d'avair la recherche dans l'url
            'method' => 'GET',
            //pas nécéssité de sécurité
            'csrf_protection' => false,
        ]);
    }
}
