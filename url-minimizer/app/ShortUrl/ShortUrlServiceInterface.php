<?php

namespace App\ShortUrl;

interface ShortUrlServiceInterface
{
    public function shortenUrl(string $url): ?string;
}
