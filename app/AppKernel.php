<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
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

            //Sonata
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
        	new FOS\UserBundle\FOSUserBundle(),
            new Sonata\DoctrinePHPCRAdminBundle\SonataDoctrinePHPCRAdminBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
        	new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),

            // Doctrine PHPCR
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),

            // CMF bundles
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new Symfony\Cmf\Bundle\TreeBrowserBundle\CmfTreeBrowserBundle(),
            new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),

            //PrestaCMS
            new Presta\CMSCoreBundle\PrestaCMSCoreBundle(),
            new Presta\CMSMediaBundle\PrestaCMSMediaBundle(),
            new Presta\CMSThemeBasicBundle\PrestaCMSThemeBasicBundle(),
            new Presta\SonataNavigationBundle\PrestaSonataNavigationBundle(),

            //Utils
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            //PrestaCMS-Sandbox
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),

            new Presta\CMSContactBundle\PrestaCMSContactBundle(),

            new CoopTilleuls\Bundle\CKEditorSonataMediaBundle\CoopTilleulsCKEditorSonataMediaBundle(),
            new Presta\ComposerPublicBundle\PrestaComposerPublicBundle(),

            //PrestaCMS-Sitemap
            new Presta\CMSSitemapBridgeBundle\PrestaCMSSitemapBridgeBundle(),
            new Presta\SitemapBundle\PrestaSitemapBundle(),
            new Presta\SonataAdminExtendedBundle\PrestaSonataAdminExtendedBundle(),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
        	new FOS\MessageBundle\FOSMessageBundle(),
        	new Application\FOS\MessageBundle\ApplicationFOSMessageBundle(),
            new Karis\CmsBundle\KarisCmsBundle(),
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
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
