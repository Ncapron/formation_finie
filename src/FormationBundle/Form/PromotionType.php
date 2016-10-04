<?php

namespace FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('file', array('label' => ' ', 'required' => false))
            ->add('nomForm')
            ->add('prenomForm')
            ->add('semaines', ChoiceType::class, array(
                'choices' => array(
                    '1' => '1',
                    '2' => '2'
                ),
                'required'    => true,
                'placeholder' => 'Selectionnez le nombre',
                'empty_data'  => null
            ))
            ->add('module')
            ->add('langage')
            ->add('eleve')
            ->add('intervenant')
            ->add('dateDeb', DateType::class, array(
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd-MM-yyyy'
            ))
            ->add('dateFin', DateType::class, array(
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd-MM-yyyy'
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FormationBundle\Entity\Promotion'
        ));
    }
}
