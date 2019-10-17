<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d26d65d6d9aba1ebd87a73333be7644
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Viking\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Viking\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Viking\\Controllers\\Controller' => __DIR__ . '/../..' . '/src/controllers/Controller.php',
        'Viking\\Controllers\\TesteController' => __DIR__ . '/../..' . '/src/controllers/TesteController.php',
        'Viking\\Routes\\Routes' => __DIR__ . '/../..' . '/src/routes/Routes.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6d26d65d6d9aba1ebd87a73333be7644::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6d26d65d6d9aba1ebd87a73333be7644::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6d26d65d6d9aba1ebd87a73333be7644::$classMap;

        }, null, ClassLoader::class);
    }
}