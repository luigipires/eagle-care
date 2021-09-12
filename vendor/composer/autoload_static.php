<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaef8cf7d10e9421026fa097485ae9b20
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaef8cf7d10e9421026fa097485ae9b20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaef8cf7d10e9421026fa097485ae9b20::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaef8cf7d10e9421026fa097485ae9b20::$classMap;

        }, null, ClassLoader::class);
    }
}
