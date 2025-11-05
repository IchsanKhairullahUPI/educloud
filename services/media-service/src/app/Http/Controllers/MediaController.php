<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate(['file' => 'required|file']);

        // Simpan file di storage/app/public/media
        $path = $request->file('file')->store('media', 'public');

        // Balikin URL supaya bisa diakses dari browser
        return response()->json([
            'url' => asset('storage/' . $path)
        ]);
    }
}
