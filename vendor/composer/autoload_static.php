<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c549349ec7a399c072920faf7db154f
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zoondo\\AllegroApi\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zoondo\\AllegroApi\\' => 
        array (
            0 => __DIR__ . '/..' . '/zoondo/allegro-api/source',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c549349ec7a399c072920faf7db154f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c549349ec7a399c072920faf7db154f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
