<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'form-control w-50 m-auto'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre adresse Email',
                'attr' => [
                    'class' => 'form-control w-50 m-auto'
                ]
            ])
            ->add('objet', TextType::class, [
                'label' => 'Objet',
                'attr' => [
                    'class' => 'form-control w-50 m-auto'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => [
                    'class' => 'form-control w-50 m-auto'
                ]
            ])
            ->add('envoyer',SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-info mt-2'
                ]
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
