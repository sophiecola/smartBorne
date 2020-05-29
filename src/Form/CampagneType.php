<?php

namespace App\Form;

use App\Entity\Campagne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\Choice;

class CampagneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut')
            ->add('dateFin')
            ->add('media', FileType::class, ['label' => 'Média (image ou vidéo)'])
            ->add('recurrence', ChoiceType::class, [
                'choices' => [
                    'D' => 'dimanche',
                    'L' => 'lundi',
                    'M' => 'mardi',
                    'M' => 'mercredi',
                    'J' => 'jeudi',
                    'V' => 'vendredi',
                    'S' => 'samedi'
                ],
                'multiple' => true,
                'expanded' => true
            ])
            ->add('diffusionDebut')
            ->add('diffusionFin')
            ->add('couleur')
            ->add('dureeAffichage')
            ->add('details')
            ->add('permission', ChoiceType::class, [
                'choices' => [
                    'Public' => 'public',
                    'En attente' => 'en_attente',
                    'Archivé' => 'archive'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Campagne::class,
        ]);
    }
}
