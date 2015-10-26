<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // Symfony Standard Edition Bundles
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Symfony CMF Standard Edition Bundles
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
            new Symfony\Cmf\Bundle\SimpleCmsBundle\CmfSimpleCmsBundle(),
			
            // Dependencies of the CmfBlockBundle
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),

            // Dependencies of the CmfMenuBundle
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
			
			// Internationalisation
			// Choix de la langue
			new Lunetics\LocaleBundle\LuneticsLocaleBundle(),

            new Symfony\Cmf\Bundle\CreateBundle\CmfCreateBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            ## Fin du CMF Standard Edition
			
			## Mysong
			
			
            // Sonata EasyExtendsBundle
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

			// CMF Admin
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new Symfony\Cmf\Bundle\TreeBrowserBundle\CmfTreeBrowserBundle(),
            new Sonata\DoctrinePHPCRAdminBundle\SonataDoctrinePHPCRAdminBundle(),
			
            // Sonata AdminBundle
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Application\Sonata\AdminBundle\ApplicationSonataAdminBundle(),
			
            // SonataUserBundle
            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
	        new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            ##

            // MopaBootstrapBundle
            new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
            #new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            #new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            #new Craue\FormFlowBundle\CraueFormFlowBundle(),

            // Remove this Bundle when using the SE as the basis for a new project
            new Acme\DemoBundle\AcmeDemoBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
			$bundles[] = new CoreSphere\ConsoleBundle\CoreSphereConsoleBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
