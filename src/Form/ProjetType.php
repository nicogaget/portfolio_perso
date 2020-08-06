<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Projet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('pitch')
            ->add('logo')
            ->add('coverFile', VichImageType::class, [
                'required' => false,
                'imagine_pattern' => 'thumb',
            ])
            ->add('description1')
            ->add('description2')
            ->add('link')
            ->add('languages', EntityType::class, [
                'class' => Language::class,
                'choice_label'=> 'name',
                'expanded' => true,
                'multiple' => true,
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
