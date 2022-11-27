<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\File\FileNotFoundException;
class FileService
{
    private static string $storage = __DIR__ . '/../../storage/';

    public static function upload($tmp, $file, $path)
    {
        $storage = self::$storage . $path;

        if (!file_exists($storage)) {
            mkdir($storage, 0777, true);
        }

        move_uploaded_file($tmp, $storage . '/' . $file);
    }

    public static function download($name, $path)
    {
        $file = self::$storage . $path;
        
        try {
            if (!file_exists($file)) {
                throw new FileNotFoundException;
            }

            header('Content-Disposition: attachment; filename="' . $name . '"');
            
            readfile($file);
        
        } catch (FileNotFoundException $e) {
            return $e->getMessage();
        }
    }

}