<?php
/*
 * This file is part of the EmbedTagBundle package.
 *
 * (c) Jérôme Vieilledent <http://www.lolart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lolart\Bundle\EmbedTagBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class LolartEmbedTagExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // Nothing to do here.
    }

    /**
     * Loads embed tag XSL stylesheet in ezpublish configuration.
     *
     * @param ContainerBuilder $container
     */
    public function prepend( ContainerBuilder $container )
    {
        $config = array(
            'system' => array(
                'default' => array(
                    'fieldtypes' => array(
                        'ezxml' => array(
                            'custom_tags' => array(
                                array( 'path' => __DIR__ . '/../Resources/xsl/embed_tag.xsl' )
                            )
                        )
                    )
                )
            )
        );
        $container->prependExtensionConfig( 'ezpublish', $config );
    }
}
