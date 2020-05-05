<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79619a50ef17d136e10e7b5851cdd023
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'A' => 
        array (
            'Analog' => 
            array (
                0 => __DIR__ . '/..' . '/analog/analog/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79619a50ef17d136e10e7b5851cdd023::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79619a50ef17d136e10e7b5851cdd023::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit79619a50ef17d136e10e7b5851cdd023::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
