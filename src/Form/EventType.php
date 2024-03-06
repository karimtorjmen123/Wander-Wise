<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Sponsor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Type', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Date', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Adresse', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Nom', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('Sponsor', EntityType::class, [
                'class' => Sponsor::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
