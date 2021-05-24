<?php

namespace App\Form;

use App\Entity\Adresses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rue', TextType::class, [
                'label' => 'Rue',
                'attr' => [
                    'class' => 'form-control m-auto'
                ]
            ])
            ->add('codePostal',TextType::class, [
                'label' => 'Code Postal',
                'attr' => [
                    'class' => 'form-control  m-auto'
                ]
            ])
            ->add('ville',TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control  m-auto'
                ]
            ])
            ->add('pays', TextType::class, [
                'label' => 'Pays',
                'data' => 'France',
                'attr' => [
                    'class' => 'form-control  m-auto'
                ]
           ])
            //->add('enseigne')
            // ->add('fichiers', FileType::class, [
            //     'label' => 'Joindre une photo de votre salon'
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresses::class,
        ]);
    }
}
