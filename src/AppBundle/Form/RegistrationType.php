<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{


    /**
     * {@inheritdoc} Including all fields from Registration entity.
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('email', EmailType::class)
            ->add('email2', EmailType::class, array(
                'required' => false
            ))
            ->add('phone')
            ->add('phone2', TelType::class, array(
                'required' => false
            ))
            ->add('copros', EntityType::class, array(
                'class' => 'AppBundle:CoPro',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'required' => false,


            ))
            ->add('dateEntree',  DateType::class, array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'choice',
                'data' => new \DateTime(),
                'years' => range(date('Y')-58, date('Y')+10),




            ))
            ->add('dateSortie', DateType::class, array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'choice',
                'data' => new \DateTime(),
                'years' => range(date('Y')-1, date('Y')+10),


            ))

            ->add('syndics', EntityType::class, array(
                'class' => 'AppBundle:Syndic',
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => false,
                'required' => false,


            ))
            ->add('associationCoPros', EntityType::class, array(
                'class' => 'AppBundle:associationCoPro',
                'choice_label'=> 'name',
                'multiple' => true,
                'required' => false,
                'mapped' => true,

            ))
            ->add('lots', EntityType::class, array(
                'class' => 'AppBundle:Lot',
                'choice_label'=> 'numero',
                'multiple' => true,
                'required' => false,
                'mapped' => true,
            ))
            ->add('type_loc_props', EntityType::class, array(
                'class' => 'AppBundle:Role',
                'choice_label'=> 'nom',
                'multiple' => true,
                'expanded' => true,
                'required' => false,

            ))

            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true, // render check-boxes
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    "Délégué de copropriété" => 'ROLE_GESTION',
                    'Gestionnaire' => 'ROLE_SALARIE',
                    'Technicien' => 'ROLE_TECHNICIEN',
                    'Habitant' => 'ROLE_HABITANT',

                ],
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }


    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }


}
