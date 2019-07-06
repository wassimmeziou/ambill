<?php

namespace App\Form;

use App\Entity\Inventaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\LigneInventaireType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class InventaireVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference',
            null,
            [
                'label' => 'Reference :',
                'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('dateInv',
            DateType::class,
            [
                
                'label' => 'Date :',
                'data' => new \DateTime('now'),
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker form-control'],
                'html5' => false,

               // 'attr' => array('class' => 'form-control'),
                // 'label_attr' => array('class' => 'fancy-checkbox')
            ])
            ->add('voiture',null,
            [
                'label' => 'Voiture :',
                'placeholder' => 'Choisir..',
                'attr' => array('class' => 'form-control')
            ])
            ->add('ligneInventaires',CollectionType::class,
            [
           //     'label' => 'ligne :',
                'entry_type' => LigneInventaireType::class,
            'entry_options' => ['label' => false],
            'by_reference' => false,

                'allow_add' => true,
                'allow_delete' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inventaire::class,
        ]);
    }
}
