<?php

namespace App\Http\Controllers;

use App\ShortUrl\ShortUrlServiceInterface;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    private ShortUrlServiceInterface $shortUrlService;

    public function __construct(ShortUrlServiceInterface $shortUrlService)
    {
        $this->shortUrlService = $shortUrlService;
    }
    public function shorten(Request $request)
    {
        try {
            $url = $request->input('url');
            $shortenedUrl = $this->shortUrlService->shortenUrl($url);
        } catch (\RuntimeException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['url' => route('redirect', ['code' => $shortenedUrl])], 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function redirect($code)
    {
        try {
            $url = $this->shortUrlService->findUrlByCode($code);
            return redirect($url);
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
