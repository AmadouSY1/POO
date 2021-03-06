<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0fad500e6e1038dfd1930a17436027a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Models\\' => 11,
            'App\\Core\\' => 9,
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0fad500e6e1038dfd1930a17436027a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0fad500e6e1038dfd1930a17436027a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0fad500e6e1038dfd1930a17436027a::$classMap;

        }, null, ClassLoader::class);
    }
}
