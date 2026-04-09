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
            ->add('email')
            ->add('animal')
            ->add('status')
            ->add('description')
            ->add('wantedDate')
            ->add('lastname')
            ->add('firstname')
            ->add('phoneNumber')
            ->add('animalFolderId', EntityType::class, [
                'class' => AnimalFolder::class,
                'choice_label' => 'id',
            ])
            ->add('veterinaryId', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
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
