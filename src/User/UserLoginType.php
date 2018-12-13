<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 10/12/2018
 * Time: 21:25
 */

namespace App\User;


use function Sodium\add;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserLoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class,[
                'label' => 'email',
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('password',PasswordType::class,[
                'label' => 'Mot de passe',
                'attr'=> ['placeholder' =>'Mot de passe']
            ])
            ->add('submit',SubmitType::class,[
                'label' => 'Connexion',
                'attr'=>[

                    'class' =>'btn btn-success'
                ]

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=> null
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_login';
    }

}