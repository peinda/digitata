<?php

namespace App\Form;

use App\Entity\Politique;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,
                ['label'=>'Nom :'])
            ->add('prenom',TextType::class,
                ['label'=>'Prenom :'])
            ->add('username',TextType::class,
                ['label'=>'Votre pseudo:'])
            ->add('telephone',NumberType::class,
                ['label'=>'Téléphone :'])
            ->add('email',EmailType::class,
                ['label'=>'Email:'])
            ->add('password',RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe:'],
                'second_options' => ['label' => 'Confirmation:'],
            ])
            ->add('politique',EntityType::class, [
                'choice_label' =>'pc',
                'class'=>Politique::class,
                'placeholder'=>'Veillez accepter les conditions d\'utilisation '
            ])
            ->add('pc', CheckboxType::class, [
                'label'    => '* Politique de confidentialité',
                'required' => true,
            ])
            ->add('cgu', CheckboxType::class, [
                'label'    => 'Condition Générale de Vente ',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
