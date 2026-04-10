<?php

namespace App\Form;

use App\Entity\AnimalFolder;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalFolderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom de l\'animal',
            ])
            ->add('age', null, [
                'label' => 'Âge de l\'animal',
            ])
            ->add('animal', null, [
                'label' => 'Type de l\'animal',
            ])
            ->add('veterinaryId', EntityType::class, [
                'label' => 'Vétérinaire',
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getFirstname() . ' ' . $user->getName();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnimalFolder::class,
        ]);
    }
}
