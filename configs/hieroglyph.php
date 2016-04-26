<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Icon set
    |--------------------------------------------------------------------------
    |
    | Set which set of icons to use by defaults
    |
    */

    'default' => 'font-awesome',

    /*
    |--------------------------------------------------------------------------
    | Icon set properties
    |--------------------------------------------------------------------------
    |
    | Create the groups of icons with the modifiers and template etc.
    |
    */

    'font-awesome' => [
        'template' => '<i class="fa %s" aria-hidden="true"></i>',
        'prefix' => 'fa-',
        'icons' => [

        ],
        'modifiers' => [
            'spin'          => 'spin',
            'large'         => 'lg',
            'twoX'          => '2x',
            'threeX'        => '3x',
            'fourX'         => '4x',
            'fiveX'         => '5x',
            'fixedWidth'    => 'fw',
            'button'        => 'btn',
        ]
    ],
];