<?php

namespace App\Form;

use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TemoignageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom:',
            ])
            ->add('commentaire', TextareaType::class, [
                'label' => 'Message:',
                'attr' => ['rows' => 5, 'max' => 500],
                'required' => 'true',
            ])
            ->add('note', IntegerType::class, [
                'label' => 'Note:',
                'attr' => ['min' => 1, 'max' => 5],
            ])
        ;
    }
}