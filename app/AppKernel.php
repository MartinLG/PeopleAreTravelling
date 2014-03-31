<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()           // Ici sont ajouté tous nos bundles et les bundles utilisés
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new PaT\VoyageBundle\PaTVoyageBundle(),
            new PaT\MaquetteBundle\PaTMaquetteBundle(),     //Bundle Maquette, pour visualiser le site
            new PaT\UserBundle\PaTUserBundle(),             //Bundle User pour gérer les connections utilisateurs
            new FOS\UserBundle\FOSUserBundle(),             //Bundle FOSUser pour avoir une base sur notre Bundle User
            new PaT\MapBundle\PaTMapBundle(),               //Bundle Map pour afficher l'API Google Maps et notre layout
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),             
            new PaT\ArticleBundle\PaTArticleBundle(),       //Bundle pour les actions associées aux articles
            new PaT\ImageBundle\PaTImageBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new Symfony\Cmf\Bundle\MediaBundle\CmfMediaBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
