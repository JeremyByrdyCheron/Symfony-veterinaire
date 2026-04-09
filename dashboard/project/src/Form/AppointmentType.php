<?php

namespace App\Form;

use App\Entity\AnimalFolder;
use App\Entity\Appointment;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Enum\Type;
use Symfony\Component\Form\Extension\Core\Type\EnumType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', EnumType::class, ['class' => Type::class])
            ->add('email', null, [
                'label' => 'Email',
            ])
            ->add('animal', null, [
                'label' => 'Animal',
            ])
            ->add('status', null, [
                'label' => 'Statut',
            ])
            ->add('description', null, [
                'label' => 'Description',
            ])
            ->add('wantedDate', null, [
                'label' => 'Date souhaitée',
                'widget' => 'single_text',
            ])
            ->add('lastname', null, [
                'label' => 'Nom de famille',
            ])
            ->add('firstname', null, [
                'label' => 'Prénom',
            ])
            ->add('phoneNumber', null, [
                'label' => 'Numéro de téléphone',
            ])
            ->add('animalFolderId', EntityType::class, [
                'label' => 'Dossier Animal',
                'class' => AnimalFolder::class,
                'choice_label' => 'name',
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
            'data_class' => Appointment::class,
        ]);
    }
}
