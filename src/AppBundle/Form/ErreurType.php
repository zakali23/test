<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErreurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeErreur', ChoiceType::class, array(
                'choices' => [
                    'no error'=>'00' ,
                    'application is busy (is not used)'=> '01',
                      'general application error' => '02',
                      'alarm in the application / atypical behaviour' => '03',
                      'low battery level'=> '04',
                      'fatal permanent error (only in combination)'=> '3',
                      'minor temporary error (only in combination)'=> '4',
                      'fatal device error (permanent)' => '40',
                      'parameters outside the operating range (temporary error)' => '80',
                      'permanent break in communication' => '136',
                      'temporary break in communication'=> '144',
                ]
            ))
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Erreur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_erreur';
    }


}
