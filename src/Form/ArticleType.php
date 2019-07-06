<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



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
            ->add('prixHT', null, ['label' => 'Prix Hors Tax :', 'attr' => array('class' => 'form-control')])
            ->add('prixTTC', null, ['label' => 'Prix Toutes Tax : ', 'attr' => array('class' => 'form-control')])
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
            ->add('barCode', null, ['label' => 'Code A Bare :', 'attr' => array('class' => 'form-control')])
            ->add('tva', null, ['label' => 'Prix Tax sur valeur ajoutée :', 'placeholder' => 'Choisir..', 'attr' => array('class' => 'form-control')]);
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
