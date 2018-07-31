<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
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
            ->add('phone', TelType::class)
            ->add('phone2', TelType::class, array(
                'required' => false
            ))
            ->add('copros', EntityType::class, array(
                'class' => 'AppBundle:CoPro',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'required' => false

            ))
            ->add('dateEntree',  DateType::class, array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'choice',
                'years' => range(date('Y')-60, date('Y')+10),
                'months' => range(1, 12),
                'days' => range(1, 31),




            ))
            ->add('dateSortie', DateType::class, array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'choice',
                'years' => range(date('Y')-1, date('Y')+10),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),

            ))

            ->add('syndics', EntityType::class, array(
                'class' => 'AppBundle:Syndic',
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => false,
                'required' => false

            ))
            ->add('associationCoPros', EntityType::class, array(
                'class' => 'AppBundle:associationCoPro',
                'choice_label'=> 'name',
                'multiple' => true,
                'required' => false

            ))
            ->add('lots', EntityType::class, array(
                'class' => 'AppBundle:Lot',
                'choice_label'=> 'numero',
                'multiple' => true,
                'required' => false
            ))
            ->add('type_loc_props', EntityType::class, array(
                'class' => 'AppBundle:Role',
                'choice_label'=> 'nom',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ))

            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true, // render check-boxes
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    "Délégué de copropriété" => 'ROLE_GESTION',
                    'Gestionnaire' => 'ROLE_SALARIE',
                    'Habitant' => 'ROLE_USER',
                ],
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
