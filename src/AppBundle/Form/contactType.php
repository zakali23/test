<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class contactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vousEtes', ChoiceType::class, [
                'choices'  => [
                    'Choisissez ' => 'null',
                    'Syndic' => 'Syndic',
                    'Bailleur'=>'Bailleur',
                    'Membre du conseil syndical'=>'Membre du conseil syndical',
                    'Locataire' => 'locataire',
                    'Copropriétaire' => 'Copropriétaire',
                    'Autre' => 'Autre'
                ],
                'data'=> 'null'


                ]
            )
            ->add('vousSouhaitez', ChoiceType::class, array(
                'choices'  => [
                    'Choisissez' => 'null',
                    'maîtriser les consommations d’énergie' => 'maitriser les consommations d’energie',
                    "maîtriser les consommations d'eau" => 'maitriser les consommations d’energie'

                ]))
            ->add('civilitecontact', ChoiceType::class, array(
                'choices'  => [
                    'Choisissez' => 'null',
                    'Madame' => 'Madame',
                    'Monsieur' => 'Monsieur'

                ]))

    ->add('nomContact',TextType::class,array())
            ->add('prenomContact',TextType::class,array())
            ->add('emailContact',EmailType::class,array())
            ->add('phoneContact',TelType::class,array())

            ->add('nomContact')
            ->add('prenomContact')
            ->add('emailContact')
            ->add('phoneContact')

            ->add('adresseContact')
            ->add('nomSyndic',TextType::class,array())
            ->add('adresseSyndic')

            ->add('phoneSyndic',TelType::class)
            ->add('emailSyndic',EmailType::class)
            ->add('nomResidence')

            ->add('phoneSyndic',TelType::class,array())
            ->add('emailSyndic',EmailType::class,array())
            ->add('nomResidence',TextType::class,array())

            ->add('adresseResidence')
            ->add('dateAG', DateType::class, array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'choice',
                'data' => new \DateTime(),
                'years' => range(date('Y')-10, date('Y')+10),

            ))
            ->add('nblogement',TextType::class,array())
            ->add('immeuble', ChoiceType::class, array(
                'choices'  => [
                    'Choisissez' => 'null',
                    'Ancien' => 'Ancien',
                    'Neuf' => 'Neuf',
                    'Recent' => 'Recent'

                ]))
            ->add('message',TextareaType::class,array());
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
