<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ServeFont extends Controller
{
    public function __invoke(string $file)
    {
        $disk = Storage::disk(config('filesystems.fonts_disk'));
        $path = 'fonts/'.$file;

        abort_unless($disk->exists($path), 404);

        return $disk->response($path, $file, [
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }
}
