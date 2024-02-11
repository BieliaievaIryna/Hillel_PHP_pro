<?php

namespace App\ShortUrl;

use App\Models\ShortUrl;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortUrlService implements ShortUrlServiceInterface
{
    public function shortenUrl(string $url): ?string
    {
        $validator = Validator::make(['url' => $url], [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return null;
        }

        $attempts = 0;
        $code = '';

        do {
            try {
                $code = Str::random(6 + $attempts);
                ShortUrl::create(['url' => $url, 'code' => $code]);
                break;
            } catch (QueryException $e) {
                if ($attempts >= 3) {
                    return null;
                }
                $attempts++;
            }
        } while (true);

        return $code;
    }
}
