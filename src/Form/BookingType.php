<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,
                ['label'=>'Prenom:'])
            ->add('objet', TextType::class,
                ['label'=>'Objet:'])
            ->add('lastname', TextType::class,
                ['label'=>'Nom:'])
            ->add('phone', TextType::class,
                ['label'=>'Téléphone:'])
            ->add('email', EmailType::class,
                ['label'=>'Email:'])
            ->add('message', TextareaType::class,
                ['label'=>'Dites nous en plus sur la nature du RV:'])
            ->add('bookingDate', DateTimeType::class,
                ['label'=>'Date de RV souhaitée:'])
            ->add('politique', CheckboxType::class, [
                'label'    => ' En cliquant sur envoyer vous acceptez nos politiques de confidentialité.
                Pour en savoir plus ',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
