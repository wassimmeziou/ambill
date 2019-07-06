<?php

namespace App\Form;

use App\Entity\Depot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresseDepot',
            null,
            [
                'label' => 'Adresse :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('nomDepot',
            null,
            [
                'label' => 'Nom :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('descrption',
            null,
            [
                'label' => 'Description :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depot::class,
        ]);
    }
}
