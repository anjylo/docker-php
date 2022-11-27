<?php

declare(strict_types=1);

namespace App\Exceptions\File;

class FileNotFoundException extends \Exception
{
    protected $message = 'File not found';
}