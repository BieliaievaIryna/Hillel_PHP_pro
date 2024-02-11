<?php

namespace App\ShortUrl;

interface ShortUrlServiceInterface
{
    public function shortenUrl(string $url): ?string;
    public function findUrlByCode(string $code): ?string;
}
