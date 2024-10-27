<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre',TextType::class,[
                'label'=>'Titre','required'=>true,
            ])
            ->add('contenu',TextareaType::class,[
                'label'=>'contenu de l`\'article',
                'required'=>true,
                'attr'=>[
                   'rows'=>5]
                ])
            ->add('dateCreation', null, [
                'widget' => 'single_text'
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
