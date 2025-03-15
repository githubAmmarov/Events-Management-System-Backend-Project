<?php 

namespace App\Traits;

use App\Models\Media;

Trait ApiTraits
{
    function saveMedia($request,$folderName)
    {
        $file = $request->file('media');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $mediaPath = $file->storeAs($folderName, $fileName, 'public');
    }
}