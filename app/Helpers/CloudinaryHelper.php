<?php

namespace App\Helpers;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

class CloudinaryHelper
{
    public static function upload(string $filePath, string $folder): string
    {
        $cloudinary = new Cloudinary(
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
                'url' => ['secure' => true]
            ])
        );

        $result = $cloudinary->uploadApi()->upload($filePath, [
            'folder' => $folder
        ]);

        return $result['secure_url'];
    }

    public static function delete(string $imageUrl): void
    {
        // Extraire le public_id depuis l'URL Cloudinary
        preg_match('/\/v\d+\/(.+)\.\w+$/', $imageUrl, $matches);
        if (!isset($matches[1])) return;

        $cloudinary = new Cloudinary(
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ])
        );

        $cloudinary->uploadApi()->destroy($matches[1]);
    }
}