<?php 

namespace App\Traits;

use App\Models\Media;

Trait ApiTraits
{
    function saveMedia($media)
    {
        
        $mediaName = time().'.'.$media->extension();  
        $media->move(public_path('media'), $mediaName);

        Media::create([
            'media_url' => 'media/' . $mediaName,
        ]);
        return $mediaName;
    }
}