<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteee957dd546ae20a014bad868df0d2f6
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
            'Config\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\Controller\\TesteController' => __DIR__ . '/../..' . '/src/Controller/TesteController.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Core\\RouterCore' => __DIR__ . '/../..' . '/core/RouterCore.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteee957dd546ae20a014bad868df0d2f6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteee957dd546ae20a014bad868df0d2f6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteee957dd546ae20a014bad868df0d2f6::$classMap;

        }, null, ClassLoader::class);
    }
}