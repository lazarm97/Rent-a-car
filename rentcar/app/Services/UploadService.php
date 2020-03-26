<?php


namespace App\Services;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class UploadService
{
    public static function upload(UploadedFile $file) {
        $nazivFajla = time()."_".$file->getClientOriginalName();

        $file->move(\public_path()."/images/cars", $nazivFajla);

        return $nazivFajla;
    }
}
