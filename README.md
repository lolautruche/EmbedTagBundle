# EmbedTagBundle

eZ Publish 5 bundle providing *custom tags* for **XmlText FieldType**, allowing to embed external content.
It is compatible with eZ Publish 5.3 / 2014.03 and superior.

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

## Usage
### Edit your rich text content in the admin
![eZ Online Editor custom tag](/Resources/images/OnlineEditor1.png?raw=true)

![Provide the content's URL](/Resources/images/OnlineEditor2.png?raw=true)

### Enjoy the result!
![Enjoy the result](/Resources/images/YouTubeResult.png?raw=true)

