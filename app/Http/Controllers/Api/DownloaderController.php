<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use TikTok\Driver\SnaptikDriver;
use TikTok\TikTokDownloader;
use Illuminate\Http\Request;

class DownloaderController extends Controller
{
    public function tiktok_downloader(Request $request)
    {
        $url = $request->url;
        $tiktok = new TikTokDownloader(
            new SnaptikDriver()
        );
        if ($url) {
            return response()->json(
                [
                    "status" => $tiktok->getVideo($url) ? 200 : 500,
                    "msg" => $tiktok->getVideo($url) ? "success" : "error",
                    "result" => $tiktok->getVideo($url) ? $tiktok->getVideo($url) : "Error"
                ]
            );
        } else {
            return response()->json(
                [
                    "status" => 500,
                    "msg" => "Fill url param"
                ]
            );
        }
    }
}