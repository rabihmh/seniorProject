<?php

namespace App\Traits;

trait ImagesTrait
{
    function saveImage($photo, $folder)
    {
        $file = $photo;
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $path = $folder;
        $photo->move($path, $filename);
        return $filename;
    }
}
