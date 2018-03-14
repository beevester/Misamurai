<?php

namespace App\Form;

use App\Entity\{Nomination, User};
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Form\{NewUserType, CommentsType};
use App\Repository\UserRepository;

class NominateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nominee', EntityType::class, [
              'class' => User::class,
              'choice_label' => 'username'
            ])
            ->add('user', EntityType::class, [
              'class' => User::class,
              'choice_label' => 'username'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Nomination::class,
        ]);
    }
}
