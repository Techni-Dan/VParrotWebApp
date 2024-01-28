<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Marque;
use App\Entity\Categorie;
use App\Entity\Type;
use App\Entity\Carburant;
use App\Entity\Modele;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prixmin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix min'
                ]
            ])
            ->add('prixmax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix max'
                ]
            ])
            ->add('kmmin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Km min'
                ]
            ])
            ->add('kmmax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Km max'
                ]
            ])
            ->add('anneemin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Année min'
                ]
            ])
            ->add('anneemax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Année max'
                ]
            ])
            ->add('marque', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Marque::class,
                'expanded' => false,
                'multiple' => true
            ])
            ->add('modele', EntityType::class, [
              'label' => false,
              'required' => false,
              'class' => Modele::class,
              'expanded' => false,
              'multiple' => true
          ])
            ->add('categorie', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Categorie::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('type', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Type::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('carburant', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Carburant::class,
                'expanded' => true,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}