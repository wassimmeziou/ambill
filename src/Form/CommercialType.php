<?php

namespace App\Form;

use App\Entity\Commercial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CountryType;


class CommercialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin', null,
            [
                'label' => 'CIN :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('nom', null,
            [
                'label' => 'Nom :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('prenom', null,
            [
                'label' => 'Prenom :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('adresse', null,
            [
                'label' => 'Adresse :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('ville', CountryType::class, array( 'label' => 'Ville',
            'preferred_choices' => array('TN'),
            'attr' => array('class' => 'form-control')
          //  'choice_translation_locale' => null
            ))
 
            ->add('age', null,
            [
                'label' => 'Age :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commercial::class,
        ]);
    }
}
