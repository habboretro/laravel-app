<?php

return [
    /**
     * Site configuration.
     */
    'site' => [
        'domain' => env('APP_URL', 'https://habbo.test'),
        'cpath' => env('HABBO_CPATH', 'https://images.habbo.test'),
        'fpath' => env('HABBO_FPATH', 'https://habbo.com.br/habbo-imaging'),
        'shortname' => env('APP_SHORT_NAME', 'Laravel'),
        'sitename' => env('APP_NAME', 'Laravel Hotel'),
        'discord_id' => env('DISCORD_ID'),
    ],

    /**
     * Client configuration.
     */
    'client' => [
        'host' => env('HABBO_SERVER_IP', '127.0.0.1'),
        'port' => env('HABBO_SERVER_PORT', 3000),
        'swf' => env('HABBO_CLIENT_SWF', 'Habbo.swf'),
        'external_override_variables' => env('HABBO_EXTERNAL_OVERRIDE_VARIABLES', 'gamedata/override/external_override_variables.txt'),
        'external_override_texts' => env('HABBO_EXTERNAL_OVERRIDE_TEXTS', 'gamedata/override/external_flash_override_texts.txt'),
        'external_variables' => env('HABBO_EXTERNAL_VARIABLES', 'gamedata/external_variables.txt'),
        'external_texts' => env('HABBO_EXTERNAL_TEXTS', 'gamedata/external_flash_texts.txt'),
        'external_figurepartlist' => env('HABBO_EXTERNAL_FIGUREPARTLIST', 'gamedata/figuredata.xml'),
        'external_figuremap' => env('HABBO_EXTERNAL_FIGUREMAP', 'gordon/PRODUCTION-201904011212-888653470/figuremap.xml'),
        'external_productdata' => env('HABBO_EXTERNAL_PRODUCTDATA', 'gamedata/productdata.txt'),
        'external_figuredata' => env('HABBO_EXTERNAL_FIGUREDATA', 'gamedata/furnidata.xml'),
        'external_base' => env('HABBO_EXTERNAL_BASE', 'gordon/PRODUCTION-201904011212-888653470'),
    ],

    /**
     * Default configuration.
     */
    'default' => [
        'min_rank' => env('MIN_STAFF_RANK', 4),
        'credits' => env('HABBO_DEFAULT_CREDITS', 10000),
        'look' => env('HABBO_DEFAULT_LOOK', 'hr-100.hd-190-7.ch-210-66.lg-270-82.sh-290-80'),
        'motto' => env('HABBO_DEFAULT_MOTTO', sprintf('Welcome to %s', config('habbo.site.sitename'))),
        'daily_respect_points' => env('HABBO_DEFAULT_DAILY_RESPECT_POINTS', 10),
        'daily_pet_respect_points' => env('HABBO_DEFAULT_DAILY_PET_RESPECT_POINTS', 10),
        'currencies' => [
            ['type' => 0, 'amount' => env('HABBO_DEFAULT_PIXELS', 10000)],
            ['type' => 5, 'amount' => env('HABBO_DEFAULT_DIAMONDS', 100)],
        ]
    ],

    /**
     * Rcon configuration.
     */
    'rcon' => [
        'enabled' => !!env('RCON_ENABLED', false),
        'host' => env('RCON_HOST', '127.0.0.1'),
        'port' => env('RCON_PORT', 3001),
        'domain' => AF_INET,
        'type' => SOCK_STREAM,
        'protocol' => SOL_TCP,
    ],

    /**
     * Find Retros configuration.
     */
    'findretros' => [
        'name' => env('FINDRETROS_NAME', 'Example'),
        'api' => 'https://findretros.com',
    ],

    /**
     * Social Configuration
     */
    'socials' => [
        [
            'text' => 'Like us on Facebook',
            'link' => env('SOCIAL_FACEBOOK_LINK', 'https://facebook.com'),
            'icon' => 'fab fa-facebook',
            'color_classes' => 'bg-blue-600 hover:bg-blue-700 active:bg-blue-700 focus:border-blue-700',
        ],
        [
            'text' => 'Tweet us on Twitter!',
            'link' => env('SOCIAL_TWITTER_LINK', 'https://twitter.com'),
            'icon' => 'fab fa-twitter-square',
            'color_classes' => 'bg-blue-400 hover:bg-blue-500 active:bg-blue-500 focus:border-blue-500',
        ],
    ],
];
