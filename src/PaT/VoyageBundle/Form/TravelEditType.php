<?php

namespace PaT\VoyageBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TravelEditType extends TravelType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

    }

    public function getName()
    {
        return 'pat_voyagebundle_traveledittype';
    }
}
