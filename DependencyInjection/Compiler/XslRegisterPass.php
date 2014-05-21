<?php
/*
 * This file is part of the EmbedTagBundle package.
 *
 * (c) Jérôme Vieilledent <http://www.lolart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lolart\Bundle\EmbedTagBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Compiler pass to register embed_tag.xsl as custom XSL stylesheet for XmlText.
 *
 * @author Jérôme Vieilledent <lolautruche@gmail.com>
 */
class XslRegisterPass implements CompilerPassInterface
{
    public function process( ContainerBuilder $container )
    {
        if (
            !(
                $container->hasParameter( 'ezsettings.default.fieldtypes.ezxml.custom_xsl' )
                && $container->hasParameter( 'ezpublish.siteaccess.list' )
            )
        )
        {
            return;
        }

        // Adding embed_tag.xsl to all declared siteaccesses.
        foreach ( $container->getParameter( 'ezpublish.siteaccess.list' ) as $sa )
        {
            if ( !$container->hasParameter( "ezsettings.$sa.fieldtypes.ezxml.custom_xsl" ) )
            {
                continue;
            }

            $xslConfig = $container->getParameter( "ezsettings.$sa.fieldtypes.ezxml.custom_xsl" );
            $xslConfig[] = array( 'path' => __DIR__ . '/../../Resources/xsl/embed_tag.xsl', 'priority' => 0 );
            $container->setParameter( "ezsettings.$sa.fieldtypes.ezxml.custom_xsl", $xslConfig );
        }
    }
}
