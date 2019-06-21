<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('prixHT')
            ->add('prixTTC')
            ->add('disponibilit')
            ->add('unit', ChoiceType::class, [
    'choices'  =>$this->getChoices(),
])
            ->add('barCode')
            ->add('tva')
        ;
    }

         //array(
         //           'required' => true,
         //           'placeholder' => 'choose type'
         //   ))
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }

    public function getChoices(){
       $x = Article::GENRES;
       $output = [];
        foreach ($x as $k => $v){
            $output[$v] = $k;    
        }
        return $output;

    }
}
