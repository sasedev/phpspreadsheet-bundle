<?php
namespace Sasedev\PhpSpreadsheetBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 *
 * Sasedev\PhpSpreadsheetBundle\DependencyInjection\Configuration
 *
 *
 * @author sasedev <sinus@sasedev.net>
 *         Created on: 23 mai 2020 @ 20:25:19
 */
class Configuration implements ConfigurationInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Symfony\Component\Config\Definition\ConfigurationInterface::getConfigTreeBuilder()
     */
    public function getConfigTreeBuilder()
    {

        $treeBuilder = new TreeBuilder('sasedev_phpspreadsheet');

        return $treeBuilder;

    }

}

