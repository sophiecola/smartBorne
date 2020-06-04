<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entreprise')
            ->add('referent')
            ->add('telephone')
            ->add('mail')
            ->add('date_debut')
            ->add('date_fin')
            ->add('numero_rue')
            ->add('nom_rue')
            ->add('cp')
            ->add('ville')
            ->add('details')
            ->add('avatar')
            ->add('sauvegarder', SubmitType::class, [
                'attr' => ['class' => 'btn btn-dark']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
