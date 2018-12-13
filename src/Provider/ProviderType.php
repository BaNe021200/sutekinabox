<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 10/12/2018
 * Time: 14:13
 */

namespace App\Provider;


use App\Entity\Provider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProviderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[

                'label'=> 'Nom',
                'attr' =>[
                    'placeholder' => 'Saisissez la raison sociale du fournisseur'
                ]
            ])
            ->add('adress',TextType::class,[

                'label'=> 'Adresse',
                'attr' =>[
                    'placeholder' => "Saisissez l'adresse du fournisseur"
                ]
            ])
            ->add('postal_code',TextType::class,[

                'label'=> 'Code Postal',
                'attr' =>[
                    'placeholder' => 'Saisissez le code postal'
                ]
            ])
            ->add('sumit',SubmitType::class,[
                'label'=>"enregistrer le fournisseur",
                'attr' =>[
                    'class' => 'btn btn-primary'
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Provider::class


        ]);
    }

}