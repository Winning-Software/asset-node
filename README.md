# Latte Asset Node

An extension for enabling the asset tag in Latte templates.

## Installation

```bash
composer require cloudbase/asset-node
```

## Registering the Extension

You will need to register the extension to take advantage of the asset tag. If you are using the `cloudbase/latte-helper` 
package with Symfony, you can register the extension by including it in your `config/latte.php` file:

```php
<?php

return [
    \CloudBase\AssetNode\AssetExtension::class => [],
];
```

If you are not using the `cloudbase/latte-helper` package, you can register the extension manually when you build your 
Latte engine:

```php
$latteEngine = new Latte\Engine();
$latteEngine->addExtension(new \CloudBase\AssetNode\AssetExtension());
```

## Usage

You can use the asset tag in your Latte templates to cleanly load CSS or JavaScript files.

```latte
{asset 'css/style.css'}
{asset 'js/script.js'}
```

The paths you provide to the asset tag should be relative to your `public/assets` directory. Ensure that your compiled assets 
are stored in this directory for the tag to work correctly.