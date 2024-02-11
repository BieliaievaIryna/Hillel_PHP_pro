<?php

namespace App\ShortUrl;

use App\Models\ShortUrl;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class ShortUrlService implements ShortUrlServiceInterface
{
    public function shortenUrl(string $url): ?string
    {
        $attempts = 0;

        do {
            try {
                $code = Str::random(6 + $attempts);
                ShortUrl::create(['url' => $url, 'code' => $code]);
                return $code;
            } catch (QueryException $e) {
                if ($attempts >= 3) {
                    throw new \RuntimeException('Failed to create short URL');
                }
                $attempts++;
            }
        } while (true);
    }

    public function findUrlByCode(string $code): string
    {
        $shortUrl = ShortUrl::where('code', $code)->firstOrFail();
        return $shortUrl->url;
    }
}
