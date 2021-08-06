<?php

namespace App\Form;

use App\Entity\Affiche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfficheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resultat')
            ->add('calendrier')
            ->add('tournoi')
            ->add('adversaire1')
            ->add('adversaire2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Affiche::class,
        ]);
    }
}
