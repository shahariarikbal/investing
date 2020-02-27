<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class FileDisplayingController extends FrontendController
{
    public function index($disk, $file)
    {
        $ext = explode('.', $file)[1];

        switch($ext) {
            case 'jpg':
                $mime = 'image/jpeg';
                break;
            case 'png':
                $mime = 'image/png';
                break;
            case 'pdf':
                $mime = 'application/pdf';
                break;
            default:
                $mime = 'deamon/deamon' ;
        }

        return response(Storage::disk($disk)->get($file), 200, ['Content-Type' => $mime]);
//        return response()->download( storage_path("app/public/support-ticket/$file"), $file);
//        return Storage::disk($disk)->download($file, 'yhdsijfyg.pdf');

    }
}
