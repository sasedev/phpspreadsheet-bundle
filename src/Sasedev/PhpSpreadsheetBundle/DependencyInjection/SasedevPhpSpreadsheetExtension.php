<?php
namespace Sasedev\PhpSpreadsheetBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 *
 * Sasedev\PhpSpreadsheetBundle\DependencyInjection$SasedevPhpSpreadsheetExtension
 *
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 *
 * @author sasedev <sinus@sasedev.net>
 *         Created on: 23 mai 2020 @ 20:27:49
 */
class SasedevPhpSpreadsheetExtension extends Extension
{

    /**
     *
     * {@inheritdoc}
     * @see \Symfony\Component\DependencyInjection\Extension\ExtensionInterface::load()
     */
    public function load(array $configs, ContainerBuilder $container)
    {

        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

    }

}

