<?php

namespace PaT\VoyageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BddArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre'       'text')
            ->add('contenu'     'textarea')
            ->add('publication' 'bool')
            ->add('iduser'      'hidden', array('data' => 1))
            ->add('idvoyage'    )
            ->add('likecount'   'hidden', array('data' => 0))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PaT\VoyageBundle\Entity\bddarticle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pat_voyagebundle_bddarticle';
    }
}
