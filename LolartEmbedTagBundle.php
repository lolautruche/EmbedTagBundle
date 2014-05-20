<?php
/*
 * This file is part of the EmbedTagBundle package.
 *
 * (c) Jérôme Vieilledent <http://www.lolart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lolart\Bundle\EmbedTagBundle;

use eZ\Bundle\EzPublishLegacyBundle\LegacyBundles\LegacyBundleInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class LolartEmbedTagBundle extends Bundle implements LegacyBundleInterface
{
    /**
     * Returns a list of legacy extension names
     *
     * @return array List of legacy extension names to inject to ActiveExtensions
     */
    public function getLegacyExtensionsNames()
    {
        return array( 'jvEmbedTag' );
    }
}
