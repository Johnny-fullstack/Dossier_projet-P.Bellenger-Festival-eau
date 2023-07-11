<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class BilleterieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nbpers', ChoiceType::class, [
                'label' => 'Nombre de personnes :',
                'required' => true,
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ],
                'expanded' => false,
                'multiple' => false,
                'attr' => ['class' => 'nbpers'],
            ])

            ->add('jour', ChoiceType::class, [
                'label' => 'Jours :',
                'required' => true,
                'choices' => [
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                    'Les 2 jours' => 'Les 2 jours',
                ],
                'choice_attr' => ['class' => 'radio'],
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'jours']
            ])
            
            ->add('Nom', TextType::class, [
                'label' => 'Nom :',
                'required' => true,
                'attr' => [
                    'placeholder' => '...',
                    'class' => 'identité',
                ],
            ])

            ->add('Prenom', TextType::class, [
                'label' => 'Prénom :',
                'required' => true,
                'attr' => [
                    'placeholder' => '...',
                    'class' => 'identité' 
                ],
            ])
    
            ->add('Email', EmailType::class, [
                'label' => 'Adresse email :',
                'required' => true,
                'attr' => [
                    'placeholder' => '...',
                    'class' => 'email',
                ],
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Je réserve !",
                'attr' => ['class' => 'submit_button'],
            ]);
    }
}