<?php

/*
 * This file is part of the Wid'op package.
 *
 * (c) Wid'op <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\HttpAdapterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Widop Http adapter configuration.
 *
 * @author Geoffrey Brier <geoffrey.brier@gmail.com>
 * @author Gelo <geloen.eric@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('widop_http_adapter');

        $rootNode->append($this->createMaxRedirectsNode());

        return $treeBuilder;
    }

    /**
     * Creates a max redirects node.
     *
     * @return \Symfony\Component\Config\Definition\Builder\NodeDefinition The max redirects node.
     */
    private function createMaxRedirectsNode()
    {
        $treeBuilder = new TreeBuilder();

        return $treeBuilder->root('max_redirects', 'scalar')->defaultValue(5);
    }
}
