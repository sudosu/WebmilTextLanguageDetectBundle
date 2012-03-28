<?php

namespace Webmil\TextLanguageDetectBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * WebmilTextLanguageDetect Extension
 */
class WebmilTextLanguageDetectExtension extends Extension
{

    /**
     * load configuration
     * 
     * @param array            $configs   configs
     * @param ContainerBuilder $container container
     * 
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('webmil.text_language_detect.omit_languages', $config['omit_languages']); 
           
        $loader = new XmlFileLoader($container, new FileLocator(array(__DIR__.'/../Resources/config/')));
        $loader->load('services.xml');
    }
}