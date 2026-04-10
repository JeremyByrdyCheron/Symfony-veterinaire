<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir votre nom'),
                    new Length(max: 100, maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères'),
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir votre prénom'),
                    new Length(max: 100, maxMessage: 'Le prénom ne peut pas dépasser {{ limit }} caractères'),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir votre email'),
                    new Length(max: 180, maxMessage: 'L\'email ne peut pas dépasser {{ limit }} caractères'),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped' => false,
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir un mot de passe'),
                    new Length(min: 6, minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères', max: 255),
                ],
            ])
            ->add('phoneNumber', TelType::class, [
                'label' => 'Téléphone',
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir votre numéro de téléphone'),
                    new Length(max: 20, maxMessage: 'Le numéro de téléphone ne peut pas dépasser {{ limit }} caractères'),
                ],
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir votre adresse'),
                    new Length(max: 255, maxMessage: 'L\'adresse ne peut pas dépasser {{ limit }} caractères'),
                ],
            ])
            ->add('licenseNumber', TextType::class, [
                'label' => 'Licence vétérinaire',
                'constraints' => [
                    new NotBlank(message: 'Veuillez saisir votre numéro de licence vétérinaire'),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'S’inscrire',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
