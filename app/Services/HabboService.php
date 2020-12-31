<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class HabboService
{
    /**
     * The avatar uri
     */
    const HABBO_AVATAR_URI = 'https://www.habbo.com/habbo-imaging/avatarimage?%s';

    /**
     * The guzzle client instance
     *
     * @var Client
     */
    protected Client $client;

    /**
     * Request options.
     * 
     * @var array
     */
    protected array $options = [
        'headers' => [
            'User-Agent' => 'Mozilla/1.22 (compatible; MSIE 5.01; PalmOS 3.0) EudoraWeb 2',
        ],
    ];

    /**
     * Initialise Habbo Service
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * Return the image code from habbo imaging.
     *
     * @param array $options
     * @return string
     */
    public function getAvatar(array $options = []): string
    {
        $cacheKey = $uri = sprintf(self::HABBO_AVATAR_URI, http_build_query($options));

        return Cache::rememberForever($cacheKey, function () use ($uri) {
            $request = $this->client->get($uri, $this->options);
            return $request->getBody()->getContents();
        });
    }
}
