<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisonSocial',
            null,
            [
                'label' => 'Raison Social :',
                'attr' => array('class' => 'form-control'),
            ])
            ->add('adresse',
            null,
            [
                'label' => 'Adresse :',
                'attr' => array('class' => 'form-control'),
            ])
            ->add('email',EmailType::class,
            [
                'label' => 'Email :',
                'attr' => array('class' => 'form-control'),
            ])
            ->add('tel',
            null, array('label' => 'Numero Telephone :','attr' => array(/*'placeholder' => '+216',*/'class' => 'form-control'),
// 'constraints' => array(new NotBlank(array("message" => "Please give a Subject")),
       
                ))
            ->add('longitude',     HiddenType::class     )
            ->add('lattitude',     HiddenType::class     )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
            'csrf_protection' => false,

        ]);
    }
}
