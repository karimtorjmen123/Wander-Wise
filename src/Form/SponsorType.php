<?php

namespace App\Form;

use App\Entity\Sponsor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class SponsorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Somme', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Tel', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Email', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('CIN', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Logo', FileType::class, [
                'label' => 'Logo (PNG or JPEG file)',
                'mapped' => false, // Not mapped to any entity property
                'required' => true,
                'attr' => ['class' => 'form-control-file'] // Assuming you want a special styling for file inputs
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sponsor::class,
        ]);
    }
}
