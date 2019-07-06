<?php

namespace App\Form;

use App\Entity\LigneInventaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneInventaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('article',null,
        [
            'label' => 'Article :',
            'placeholder' => 'Choisir..',
            'attr' => array('class' => 'form-control')
        ])
            ->add('qteInv', null,
            [
                'label' => 'Quantité :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneInventaire::class,
        ]);
    }
}
