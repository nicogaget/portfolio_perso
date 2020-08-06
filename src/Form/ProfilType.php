<?php

namespace App\Form;

use App\Entity\Profil;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('firstName')
            ->add('lastName')
            ->add('picture')
            ->add('description1')
            ->add('description2')
            ->add('adress')
            ->add('phone')
            ->add('facebook')
            ->add('linkedin')
            ->add('github')
            ->add('twitter')
            ->add('instagram')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}
