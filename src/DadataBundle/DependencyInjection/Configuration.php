<?php
namespace DadataBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dadata');
        $rootNode
            ->children()
                ->arrayNode('clients')
                    ->useAttributeAsKey('client')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('token')->end()
                            ->scalarNode('secret')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}