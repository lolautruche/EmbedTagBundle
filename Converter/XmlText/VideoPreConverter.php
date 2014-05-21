<?php
/*
 * This file is part of the EmbedTagBundle package.
 *
 * (c) Jérôme Vieilledent <http://www.lolart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lolart\Bundle\EmbedTagBundle\Converter\XmlText;

use DOMDocument;
use eZ\Publish\Core\FieldType\XmlText\Converter;
use DOMXPath;

/**
 * This converter converts regular video links (e.g. https://youtube.com/watch?<videoId>)
 * to corresponding embed links, to be used in the XSL stylesheet.
 *
 * @author Jérôme Vieilledent <lolautruche@gmail.com>
 */
class VideoPreConverter implements Converter
{
    const CUSTOMTAG_NAMESPACE = 'http://ez.no/namespaces/ezpublish3/custom/';

    /**
     * Array of video options, indexed by vendor identifier (e.g. "youtube", "vimeo").
     * Each entry consists of a hash of options:
     *  - default_width
     *  - default_height
     *  - embed_pattern
     *  - regexp
     *
     * "embed_pattern" is the pattern for the final embed URL. It contains a "$$$VIDEO$$$" token, to be replaced
     * by the video ID.
     *
     * "regexp" is the regular expression used for video ID extraction.
     *
     * @var array
     */
    private $videoProviderOptions;

    public function __construct( array $videoProviderOptions )
    {
        $this->videoProviderOptions = $videoProviderOptions;
    }

    public function convert( DOMDocument $xmlDoc )
    {
        $xpath = new DOMXPath( $xmlDoc );

        foreach ( $this->videoProviderOptions as $identifier => $options )
        {
            $tags = $xpath->query( "//custom[@name='$identifier']" );
            foreach ( $tags as $tag )
            {
                /** @var \DOMElement $tag */
                if ( !$tag->getAttributeNS( self::CUSTOMTAG_NAMESPACE, 'videoWidth' ) )
                {
                    $tag->setAttributeNS( self::CUSTOMTAG_NAMESPACE, 'videoWidth', $options['default_width'] );
                }

                if ( !$tag->getAttributeNS( self::CUSTOMTAG_NAMESPACE, 'videoHeight' ) )
                {
                    $tag->setAttributeNS( self::CUSTOMTAG_NAMESPACE, 'videoHeight', $options['default_height'] );
                }

                preg_match( $options['regexp'], $tag->getAttributeNS( self::CUSTOMTAG_NAMESPACE, 'video' ), $matches );
                if ( isset( $matches['videoId'] ) )
                {
                    $embedLink = str_replace( '$$$VIDEO$$$', $matches['videoId'], $options['embed_pattern'] );
                    $tag->setAttributeNS( self::CUSTOMTAG_NAMESPACE, 'video', $embedLink );
                }
            }
        }
    }
}
 