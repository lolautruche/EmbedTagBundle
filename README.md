# EmbedTagBundle

eZ Publish 5 bundle providing *custom tags* for **XmlText FieldType**, allowing to embed external content.

## Features
Current implementation provides custom tags support for:

* YouTube
* Vimeo
* DailyMotion

Custom tags can be edited in the admin interface.


## Installation
This bundle is available on [Packagist](https://packagist.org/packages/lolautruche/embedtag-bundle).
You can install it using Composer:

```bash
$ composer require lolautruche/embedtag-bundle:@stable
```

Then add the bundle to your application:

```php
<?php
// ezpublish/EzPublishKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Lolart\Bundle\EmbedTagBundle\LolartEmbedTagBundle(),
        // ...
    );
}
```

