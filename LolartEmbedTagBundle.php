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

use Lolart\Bundle\EmbedTagBundle\DependencyInjection\Compiler\XslRegisterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class LolartEmbedTagBundle
 *
 * @author Jérôme Vieilledent <lolautruche@gmail.com>
 */
class LolartEmbedTagBundle extends Bundle
{
    public function build( ContainerBuilder $container )
    {
        parent::build( $container );
        $container->addCompilerPass( new XslRegisterPass() );
    }
}
