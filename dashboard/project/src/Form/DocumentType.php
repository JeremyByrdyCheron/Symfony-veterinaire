<?php

namespace App\Form;

use App\Entity\AnimalFolder;
use App\Entity\Appointment;
use App\Entity\Document;
use App\Enum\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pdfFile', VichFileType::class, [
                'label'        => 'PDF',
                'required'     => true,
                'allow_delete' => false,
                'download_uri' => false,
            ])
            ->add('animalId', EntityType::class, [
                'class'        => AnimalFolder::class,
                'choice_label' => 'name',
                'label'        => 'Animal',
            ])
            ->add('appointmentId', EntityType::class, [
                'class'        => Appointment::class,
                'choice_label' => fn(Appointment $a) =>
                $a->getFirstname() . ' ' . $a->getLastname()
                    . ' — ' . ($a->getAnimalFolderId()?->getName() ?? 'Aucun animal')
                    . ' (' . $a->getEmail() . ')',
                'label'        => 'Rendez-vous concerné',
                'placeholder'  => 'Sélectionner un rendez-vous',
                'query_builder' => fn($repo) => $repo->createQueryBuilder('a')
                    ->where('a.status = :status')
                    ->setParameter('status', Status::ACCEPTED),
            ])
        ;

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

            $appointment = $data->getAppointmentId();
            $animal = $data->getAnimalId();

            if ($appointment && $animal) {
                $appointmentAnimal = $appointment->getAnimalFolderId();

                if (!$appointmentAnimal) {
                    $form->get('appointmentId')->addError(
                        new FormError("Ce rendez-vous n'a pas d'animal associé.")
                    );
                    return;
                }

                if ($appointmentAnimal->getId() !== $animal->getId()) {
                    $form->get('appointmentId')->addError(
                        new FormError("L'animal sélectionné ne correspond pas au rendez-vous.")
                    );
                }
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
