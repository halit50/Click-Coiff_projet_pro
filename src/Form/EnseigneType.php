<?php

namespace App\Form;

use App\Entity\Enseigne;
use App\Form\AdressesType;
use App\Form\RegisterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EnseigneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label'=> 'Nom de votre enseigne',
                'attr' => [
                    'class' => 'form-control m-auto',
                    'placeholder' => 'Merci de saisir le nom de votre enseigne'
                ]
            ])
            ->add('kbis',TextType::class,[
                'label'=> 'Votre numéro de Siren',
                'attr' => [
                    'class' => 'form-control m-auto',
                    'placeholder' => 'Merci de saisir votre numéro de Siren'
                ]])
            ->add('reseausocial',TextType::class,[
                'label'=> 'Vos réseaux sociaux (facultatif)',
                'attr' => [
                    'class' => 'form-control m-auto',
                    'placeholder' => 'Entrer l\'URL de votre réseau'
                ]])
            ->add('typeCoiffeur', ChoiceType::class, [
                'label' => 'Vous êtes un salon de coiffure pour homme, femme ou les deux?',
                'choices'=> [
                    ' ' =>0,
                    'Femme' => "Femme",
                    'Homme' => "Homme",
                    'Mixte'=>'Mixte'
                ],
                'attr' => [
                    'class' => 'form-control m-auto'
                ]
            ])
            ->add('user', RegisterType::class, [
                'label' => 'Gérant',
            ])
            ->add('adresses', AdressesType::class
            )
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enseigne::class,
        ]);
    }
}
