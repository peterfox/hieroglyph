Hieroglyph
==========

A simple package for PHP making it easier to switch around the icon sets you use in your markup. There's currently a 
lot of different icon sets and changing between them can be a pain. The idea of Hieroglyph is that you can map the 
correct icons in your application to the different sets and even apply modifiers without fixing your mark up to using 
one icon set.

Install
-------

You can install via composer

```
composer require peterfox/hieroglyph
```


Using Hieroglyph with Laravel
-----

Add the Service Provider

```
Hieroglyph\Laravel\HieroglyphServiceProvider::class,
```

Add the Facade

```
'Hiero' => Hieroglyph\Laravel\HieroglyphFacade::class,
```

Publish the config using artisan

```
php artisan vendor:publish
```

Edit the hierogplyph config

```
<?php

return [

    'default' => 'font-awesome',

    'font-awesome' => [
        'template' => '<i class="fa %s" aria-hidden="true"></i>',
        'prefix' => 'fa-',
        'icons' => [
            // Add icons here .e.g. 'create' => 'pencil' or 'loading' => 'spinner'
        ],
        'modifiers' => [
            'spin' => 'spin',
            'large' => 'lg',
            'twoX' => '2x',
            'threeX' => '3x',
            'fourX' => '4x',
            'fiveX' => '5x',
            'fixedWidth'    => 'fw',
            'button'        => 'btn',
        ]
    ],
];
```

Using the Facade

```
Hiero::glyph('twitter');
Hiero::glyph('instagram')->large();
Hiero::glyph('loading')->large()->spin();
Hiero::glyph('loading')->button()->spin();
Hiero::glyphDecision(true, 'ok', 'wrong')->large();
```

Using the Facade in Blade

```
{!! Hiero::glyph('facebook') !!}
{!! Hiero::glyphDecision(true, 'ok', 'wrong')->large() !!}
```

Contribute
----------

Currently I've only supported what I've personally needed. I'd love to make a twig extension and a Symphony bundle but 
currently it's no a requirement for me. I can't really take any requests or suggestions but if you want to do the work 
and make a pull request I'll do my best to add it.
