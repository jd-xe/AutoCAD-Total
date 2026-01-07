<?php

namespace Jd\Amisam\Services;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class CloudinaryService
{
    private $cloudinary;

    public function __construct()
    {
        /*var_dump($_ENV);
        die();

        var_dump($_ENV['CLOUDINARY_CLOUD_NAME'], $_ENV['CLOUDINARY_API_KEY'], $_ENV['CLOUDINARY_API_SECRET'], $_ENV['CLOUDINARY_FOLDER']);
        die();*/

        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
                'api_key' => $_ENV['CLOUDINARY_API_KEY'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }

    /*public function __construct()
    {
        $cloudinaryUrl = "cloudinary://" . $_ENV['CLOUDINARY_API_KEY'] . ":" . $_ENV['CLOUDINARY_API_SECRET'] . "@" . $_ENV['CLOUDINARY_CLOUD_NAME'];
        
        $this->cloudinary = new Cloudinary($cloudinaryUrl);
    }*/

    public function uploadFile($filePath, $publicId = null)
    {
        $options = [
            'folder' => $_ENV['CLOUDINARY_FOLDER'],
            'use_filename' => true,
            'unique_filename' => false,
        ];

        if ($publicId) {
            $options['public_id'] = $publicId;
        }

        #$result = (new UploadApi())->upload($filePath, $options);
        $result = $this->cloudinary->uploadApi()->upload($filePath, $options);

        return $result['secure_url']; // Retorna la URL segura del archivo

        #return $this->cloudinary->uploadApi()->upload($filePath, $options)['secure_url'];
    }
}
