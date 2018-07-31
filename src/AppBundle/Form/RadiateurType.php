<?php

namespace AppBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class RadiateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           /* ->add('calorimetre', EntityType::class, array(
                'class' => 'AppBundle:Compteur',
                'attr' =>array('readonly' => true)
            ))*/
            ->add('modele', TextType::class)
            ->add('type', ChoiceType::class,
                array(
                    'choices' => [
                        'choisir' => 'null',
                        'Fonte' => 'Fonte',
                        'type10' => 'type10',
                        'type11' => "type11",
                        'type20' => "type20",
                        'type21' => "type21",
                        'type22' => "type22",
                        'type30' => "type30",
                        'type32' => "type32",
                        ]
                ))
            ->add('profondeur', ChoiceType::class,
                array(
                    'choices' => [
                        'choisir' => 'null',
                        '15' => '15',
                        '25' => '25',
                        '35' => '35',
                        '1 panneau' => '1 panneau',
                        "1 panneau 1rang d'ailettes" => "1 panneau 1rang d'ailettes",
                        '2 panneaux ' => "2 panneaux",
                        "2 panneaux 1 rang d'ailettes" => "2 panneaux 1 rang d'ailettes",
                        "2 panneaux 2 rangs d'ailettes" => "2 panneaux 2 rangs d'ailettes",
                        "3 panneaux" => "3 panneaux",
                        "3 panneaux 2 rangs d'ailettes" => "3 panneaux 2 rangs d'ailettes",
                        ],
                        'choice_attr' => function($choiceValue, $key, $value) {
                            // adds a class like attending_yes, attending_no, etc
                            if($value == 15 || $value == 25 || $value == 35 || $value == 'null'){
                                return ['id' => 'Fonte'];
                            }
                            return ['id' => 'acier'];
                        },

                ))
            ->add('hauteur', ChoiceType::class,
                array(
                    'choices' => [
                        'choisir' => 'null',
                        '0.3' => '0.3',
                        '0.6' => '0.6',
                        '0.8' => '0.8',
                    ]
                ))
            ->add('longueur', TextType::class)
            ->add('regimeDimension', TextType::class, array(
                'attr' => array('readonly' => true)
            ))
            ->add('puissanceDeltaT50', TextType::class, array(
                'attr' => array('readonly' => true)
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Radiateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_radiateur';
    }


}
