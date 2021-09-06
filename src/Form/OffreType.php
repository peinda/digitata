<?php

namespace App\Form;

use App\Entity\Offres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', TextType::class,
                ['label'=>'Reférence:'])
            ->add('pole', TextType::class,
                ['label'=>'Pole:'])
            ->add('adresse', TextType::class,
                ['label'=>'Adesse:'])
            ->add('contratType', TextType::class,
                ['label'=>'Type de Contrat:'])
            ->add('payment', TextType::class,
                ['label'=>'Salaire (KE):'])
            ->add('skills', TextType::class,
                ['label'=>'Compétences attendues:'])
            ->add('posteRecherche', TextType::class,
                ['label'=>'Poste Recherché:'])
            ->add('begginingAT', DateType::class,
                ['label'=>'Date de début:'])
            ->add('description', TextareaType::class,
                ['label'=>'Description de l\'offre:'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offres::class,
        ]);
    }
}
