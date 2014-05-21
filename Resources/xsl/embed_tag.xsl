<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
        version="1.0"
        xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
        xmlns:xhtml="http://ez.no/namespaces/ezpublish3/xhtml/"
        xmlns:custom="http://ez.no/namespaces/ezpublish3/custom/"
        xmlns:image="http://ez.no/namespaces/ezpublish3/image/"
        exclude-result-prefixes="xhtml custom image">

    <xsl:output method="html" indent="yes" encoding="UTF-8"/>

    <!-- Template below will match the following custom tag: -->
    <!-- <custom name="youtube" custom:video="//www.youtube.com/embed/MfOnq-zXXBw" custom:videoWidth="640" custom:videoHeight="380"/> -->
    <xsl:template match="custom[@name='youtube']">
        <div class="jvembed jvembed-youtube">
            <iframe>
                <xsl:attribute name="width"><xsl:value-of select="@custom:videoWidth"/></xsl:attribute>
                <xsl:attribute name="height"><xsl:value-of select="@custom:videoHeight"/></xsl:attribute>
                <xsl:attribute name="src"><xsl:value-of select="@custom:video"/></xsl:attribute>
                <xsl:attribute name="frameborder">0</xsl:attribute>
                <xsl:attribute name="allowfullscreen"/>
            </iframe>
        </div>
    </xsl:template>

    <xsl:template match="custom[@name='dailymotion']">
        <div class="jvembed jvembed-dailymotion">
            <iframe>
                <xsl:attribute name="width"><xsl:value-of select="@custom:videoWidth"/></xsl:attribute>
                <xsl:attribute name="height"><xsl:value-of select="@custom:videoHeight"/></xsl:attribute>
                <xsl:attribute name="src"><xsl:value-of select="@custom:video"/></xsl:attribute>
                <xsl:attribute name="frameborder">0</xsl:attribute>
                <xsl:attribute name="allowfullscreen"/>
            </iframe>
        </div>
    </xsl:template>

    <xsl:template match="custom[@name='vimeo']">
        <div class="jvembed jvembed-vimeo">
            <iframe>
                <xsl:attribute name="width"><xsl:value-of select="@custom:videoWidth"/></xsl:attribute>
                <xsl:attribute name="height"><xsl:value-of select="@custom:videoHeight"/></xsl:attribute>
                <xsl:attribute name="src"><xsl:value-of select="@custom:video"/></xsl:attribute>
                <xsl:attribute name="frameborder">0</xsl:attribute>
                <xsl:attribute name="allowfullscreen"/>
            </iframe>
        </div>
    </xsl:template>
</xsl:stylesheet>