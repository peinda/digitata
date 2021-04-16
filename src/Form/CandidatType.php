<?php

namespace App\Form;

use App\Entity\Candidats;
use App\Entity\Offres;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,
                ['label'=>'Nom :'])
            ->add('prenom',TextType::class,
                ['label'=>'Prenom :'])
            ->add('mobile',TextType::class,
                [
                    'attr' => [
                    'placeholder' => 'exemple +33 00 00 00 00',
                    'label'=>'Téléphone :']
                ])
            ->add('email',EmailType::class,
                ['label'=>'Email:'])
            ->add('adresse', TextType::class,
                ['label'=>'Adresse :'])
            ->add('motivation', TextareaType::class,
                [ 'required'   => false,
                    'label'=>'Dites nous plus sur vous :'])
            ->add('brochure', FileType::class, [
                'label' => 'CV (PDF file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidats::class,
        ]);
    }
}
