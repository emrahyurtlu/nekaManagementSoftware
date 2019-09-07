<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploadFile(Request $request, $targetPath, $fieldName = 'image')
    {
        $fileNameToStore = 'noimage.jpg';
        if ($request->hasFile($fieldName)) {
            // Get filename with extension
            $filenameWithExt = $request->file($fieldName)->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $request->file($fieldName)->storeAs($targetPath, $fileNameToStore);
        }

        return $fileNameToStore;
    }

    public function deleteFile($path)
    {
        Storage::disk('local')->delete($path);
    }
}
