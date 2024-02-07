<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function shorten(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid URL'], 400);
        }

        $url = $request->input('url');
        $attempts = 0;
        $code = '';

        do {
            try {
                $code = Str::random(6 + $attempts);
                ShortUrl::create(['url' => $url, 'code' => $code]);
                break;
            } catch (QueryException $e) {
                if ($attempts >= 3) {
                    return response()->json(['error' => 'Failed to create short URL'], 500);
                }
                $attempts++;
            }
        } while (true);

        return response()->json(['url' => route('redirect', ['code' => $code])], 200, [], JSON_UNESCAPED_SLASHES);
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
