<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploadFile($path, $fieldName = 'image', $disk = 's3')
    {
        return request()->file($fieldName)->store($path, $disk);
    }

    public function deleteFile($path, $disk = 's3')
    {
        Storage::disk($disk)->delete($path);
    }
}
