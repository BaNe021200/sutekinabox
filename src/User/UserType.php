<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 10/12/2018
 * Time: 23:38
 */

namespace App\User;


use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Saisissez votre Prénom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Prénom'
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Saisissez votre Nom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Saisissez votre Email',
                'attr' => [
                    'placeholder' => 'Saisissez votre Email'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Saisissez votre mot de passe',
                'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe'
                ]
            ])
            ->add('roles',ChoiceType::class,[

                'choices'=>[
                    'provider' =>'ROLE_PROVIDER',
                    'achat'=>'ROLE_ACHAT',
                    'marketing' => 'ROLE_MARKETING'],
                'multiple' => true,
                'expanded' =>false
                //'class' =>User::class
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Inscrire l'utilisateur !",
                'attr'=>[
                    'class'=> 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=> User::class
        ]);
    }

}