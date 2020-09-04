<?php

namespace App\Form;

use App\Entity\Horaire;
use App\Entity\TypeHoraire;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoraireCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('commentaire', TextareaType::class, [
                'required' => false,
            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Type(\DateTime::class),
                ]
            ])
            ->add('dateHeureFin', DateTimeType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Type(\DateTime::class),
                ]
            ])
            ->add('niveauPriorite', ChoiceType::class, [
                'choices' => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => TypeHoraire::class,
                'choice_label' => 'nom',
            ])
            ->add('Enregistrer', SubmitType::class)
        ;
    }
}
