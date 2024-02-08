<?php

namespace App\Http\Controllers;

use App\ShortUrl\ShortUrlServiceInterface;
use Illuminate\Http\Request;
use App\Models\ShortUrl;


class ShortUrlController extends Controller
{
    private ShortUrlServiceInterface $shortUrlService;

    public function __construct(ShortUrlServiceInterface $shortUrlService)
    {
        $this->shortUrlService = $shortUrlService;
    }
    public function shorten(Request $request)
    {
        $url = $request->input('url');
        $shortenedUrl = $this->shortUrlService->shortenUrl($url);

        if (!$shortenedUrl) {
            return response()->json(['error' => 'Failed to create short URL'], 500);
        }

        return response()->json(['url' => route('redirect', ['code' => $shortenedUrl])], 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function redirect($code)
    {
        $shortUrl = ShortUrl::where('code', $code)->first();

        if (!$shortUrl) {
            abort(404);
        }

        return redirect($shortUrl->url);
    }
}
