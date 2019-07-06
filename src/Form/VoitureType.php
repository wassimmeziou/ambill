<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule', null,
            [
                'label' => 'Matricule :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('model', null,
            [
                'label' => 'Model :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('commercial',null, [
                'label' => 'Commercial :',
                // 'choices'  => array(
                //     'Piece' => 'Piece',
                //     'Litre' =>  'Litre',
                //     'Kg' =>  'Kg',
                // ),
                'placeholder' => 'Choisir..',
                'attr' => array('class' => 'form-control')
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
