<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DevisType extends AbstractType
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
            ->add('budget', ChoiceType::class,
                [
                    'choices'  => [
                        '--Choisir un prix--' => '--Choisir un prix--',
                        'Moins de 10 000 EUROS HT' => 'Moins de 10 000 EUROS HT',
                        'Entre 10 000 et 15 000 EUROS HT' => 'Entre 10 000 et 15 000 EUROS HT',
                        'Plus de 15 000 EUROS HT ' => 'Plus de 15 000 EUROS HT',
                    ],
                ])
            ->add('message', TextareaType::class)
            ->add('email', EmailType::class,
                ['label'=>'Email:'])
            ->add('descrioptionprojet', TextareaType::class,
                ['label'=>'Description de votre projet*:'])
            ->add('societe', TextType::class,
                ['label'=>'Societe*:'])
            ->add('datesouhaitee', TextType::class,
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
