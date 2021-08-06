<?php

namespace App\Form;

use App\Entity\Athlete;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AthleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('birth_date', DateType::class,['label' => 'date de naissance', 'widget' => 'single_text'])
            ->add('taille')
            ->add('discipline')
            ->add('origine')
            ->add('category')
            ->add('ranking')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Athlete::class,
        ]);
    }
}
