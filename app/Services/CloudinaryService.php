<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\UploadedFile;

class CloudinaryService
{
    /**
     * Constructor del servicio
     */
    public function __construct()
    {
        // Constructor logic here
    }

    /**
     * Sube un archivo a Cloudinary y retorna la URL.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @return string|null
     */
    public function uploadFile(UploadedFile $file, string $folder = 'AMISAM'): ?string
    {
        try {
            $uploadResult = Cloudinary::uploadApi()->upload($file->getRealPath(), [
                'folder' => $folder,
                'access_mode' => 'public',
                'resource_type' => 'auto',
            ]);

            if ($uploadResult === null || !isset($uploadResult['secure_url'])) {
                \Log::error("No se pudo obtener 'secure_url' de Cloudinary. Respuesta completa: " . json_encode($uploadResult));
                throw new \Exception("Error al subir el archivo a Cloudinary: no se obtuvo 'secure_url'.");
            }

            return $uploadResult['secure_url'];
        } catch (\Exception $e) {
            // Loguea o lanza la excepción según tu lógica
            \Log::error('Error subiendo a Cloudinary: ' . $e->getMessage());
            return null;
        }
    }
}
