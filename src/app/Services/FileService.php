<?php

declare(strict_types=1);

namespace App\Services;

class FileService
{
    public static function upload($tmp, $file, $directory)
    {
        $storage = __DIR__ . '/../../storage/' . $directory;

        if (!file_exists($storage)) {
            mkdir($storage, 0777, true);
        }

        move_uploaded_file($tmp, $storage . '/' . $file);
    }

}