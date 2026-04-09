<?php

namespace App\Form;

use App\Entity\AnimalFolder;
use App\Entity\Document;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pdfFile', VichFileType::class, [
                'label' => 'PDF',
                'required' => true,
                'allow_delete' => true,
                'download_uri' => true,
            ])
            ->add('animalId', EntityType::class, [
                'class' => AnimalFolder::class,
                'choice_label' => 'name',
                'label' => 'Animal'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
