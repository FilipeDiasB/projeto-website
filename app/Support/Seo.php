<?php

namespace App\Support;

use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    private $optimizer;

    public function __construct()
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
            env('APP_NAME'),
            'pt_BR',
            'article'
        )->twitterCard(
            env('CLIENT_SOCIAL_TWITTER_CREATOR'),
            env('CLIENT_SOCIAL_TWITTER_PUBLISHER'),
            env('CLIENT_DATA_LINK_TWITTER'),
        );
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true)
    {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }

}
