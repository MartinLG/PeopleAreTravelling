<?php

namespace PaT\VoyageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TravelType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',              'text')
            ->add('place',              'country')
            ->add('budget',             'money')
            ->add('duration',           'hidden')
            ->add('startdate',          'date', array('years' => range(1960, date('Y'))))
            ->add('enddate',            'date', array('years' => range(1960, date('Y'))))
            ->add('description',        'textarea')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PaT\VoyageBundle\Entity\Travel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pat_voyagebundle_travel';
    }
}
