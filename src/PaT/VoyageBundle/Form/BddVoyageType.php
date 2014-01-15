<?php

namespace PaT\VoyageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BddVoyageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre',          'text')
        ->add('description',    'textarea')
        ->add('budget',         'money')
        ->add('lieu',           'country')
        ->add('datedebut',      'date', array('years' => range(1960, date('Y'))))
        ->add('datefin',        'date')
        ->add('duree',          'hidden', array('data' => 666))
        ->add('Like_count',     'hidden', array('data' => 0))
        ->add('Id_user',        'hidden', array('data' => 1))
        ->add('nbrarticle',     'hidden', array('data' => 0));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PaT\VoyageBundle\Entity\BddVoyage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pat_voyagebundle_bddvoyage';
    }
}
