<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'designation',
                null,
                [
                    'label' => 'designation :',
                    'attr' => array('class' => 'form-control'),
                    // 'label_attr' => array('class' => 'fancy-checkbox')
                ]
            )


            ->add('prixAchat', null, ['label' => 'Prix d\'achat :', 
            'attr' => array('class' => 'form-control calc achat'/*,'value' => '0'*/)])

            ->add('marge', null, ['label' => 'Marge :', 
            'required'=>true,
            'attr' => array('class' => 'form-control calc marge'/*,'value' => '0'*/)])

            ->add('prixVente', null, ['label' => 'Prix Vente :',
             'attr' => array('class' => 'form-control res','readonly'   => true)])



             ->add('tva', EntityType::class, [
                'label' => 'Prix Tax sur valeur ajoutée :',
                //'choice_label' => 'id',
                'required'=>true,
                'placeholder' => 'Choisir..',
                'class' => 'App\Entity\Tva',
                'attr' => array('class' => 'form-control calc tva')
            ])

            ->add('prixTTC', null, [
                'label' => 'Prix Toutes Tax : ', 
               
                 'attr' => array('class' => 'form-control ventetva','readonly'=> true)
            ])
            
            ->add('disponibilit', ChoiceType::class, array(
                'label' => 'disponibile :',
                
                // 'attr' => array('class' => 'radcust'),
                'choices' => array(
                    'Oui' => true,
                    'Non' => false,
                ),
                'data' => true,
                'expanded' => true,
            ))
            //, CheckboxType::class, [
            //  'label' => 'disponibilité : ',
            //    'attr' => array('class' => 'fancy-checkbox'),
            //'label_attr' => array('class' => 'fancy-checkbox')
            //    ])
            ->add(
                'unit',
                ChoiceType::class,
                [
                    'label' => 'Unité :',
                    'choices'  => array(
                        'Piece' => 'Piece',
                        'Litre' =>  'Litre',
                        'Kg' =>  'Kg',
                    ),
                    'placeholder' => 'Choisir..',
                    'attr' => array('class' => 'form-control')
                ]
            )
            ->add('barCode', null, ['label' => 'Code A Bare :', 'attr' => array('class' => 'form-control')]);
    }


    // ->add('pays',DateTimeType::class, [
    //     'date_label' => 'Starts On',
    // ])
    //  <div class="form-control"> {{ form_row(form.designation) }}</div>
    //array(
    //           'required' => true,
    //           'placeholder' => 'choose type'
    //      ))
    //     {{ form_row(form.disponibilit) }}

    //     {{ form_label(form.disponibilit) }}
    //       {{ form_widget(form.disponibilit) }}
    //       <span> 
    //       hi
    //       </span>
    //    {{ form_end(form.disponibilit) }}
    // ->add('groupe', ChoiceType::class, array(
    //     'choices' => array(
    //         'Administrateur' => 'ROLE_SUPER_ADMIN',
    //         'Gérant' => 'ROLE_ADMIN',
    //         'Opérateur' => 'ROLE_USER'
    //     ),
    //     'expanded' => true,
    // ))
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'csrf_protection' => false,

        ]);
    }

    public function getChoices()
    {
        $x = Article::GENRES;
        $output = [];
        foreach ($x as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
