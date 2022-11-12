<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb133577aee2064498660ece3873638bd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb133577aee2064498660ece3873638bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb133577aee2064498660ece3873638bd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb133577aee2064498660ece3873638bd::$classMap;

        }, null, ClassLoader::class);
    }
}