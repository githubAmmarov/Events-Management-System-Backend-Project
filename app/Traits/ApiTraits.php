<?php 

namespace App\Traits;

use App\Models\Media;

Trait ApiTraits
{
    function saveImage($photo)
    {
        
        $imageName = time().'.'.$photo->extension();  
        $photo->move(public_path('images'), $imageName);

        Media::create([
            'media_url' => 'images/' . $imageName,
        ]);
        return $imageName;
    }
}