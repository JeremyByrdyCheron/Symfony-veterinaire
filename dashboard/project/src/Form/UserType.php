<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom de famille',
            ])
            ->add('firstname', null, [
                'label' => 'Prénom',
            ])
            ->add('email', null, [
                'label' => 'Email',
            ])
            ->add('password', null, [
                'label' => 'Mot de passe',
            ])
            ->add('phoneNumber', null, [
                'label' => 'Numéro de téléphone',
            ])
            ->add('address', null, [
                'label' => 'Adresse',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
