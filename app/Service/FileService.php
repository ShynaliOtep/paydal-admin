<?php

namespace App\Service;

class FileService
{
    public static function paydalFileUrl(string $path): string
    {
        return config('paydal.host') . substr($path, 1);
    }
}
