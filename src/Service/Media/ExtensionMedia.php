<?php


namespace App\Service\Media;


use App\Repository\MediaRepository;

class ExtensionMedia
{

    public static function getMediaBanners()
    {
        $repository = new MediaRepository();
        return $repository->getMedia();
    }

}