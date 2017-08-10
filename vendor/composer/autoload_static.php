<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5630fa7e608591ab94b1bdd6e1d9fd87
{
    public static $files = array (
        '70c2cc8e471afe501c2cdffcff4501b1' => __DIR__ . '/../..' . '/common/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Klein\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Klein\\' => 
        array (
            0 => __DIR__ . '/..' . '/klein/klein/src/Klein',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpexcel/phpexcel/Classes',
            ),
        ),
    );

    public static $classMap = array (
        'Box' => __DIR__ . '/../..' . '/common/box.php',
        'Controller' => __DIR__ . '/../..' . '/app/controller/controller.php',
        'DB' => __DIR__ . '/../..' . '/common/db.php',
        'Log' => __DIR__ . '/../..' . '/common/log.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5630fa7e608591ab94b1bdd6e1d9fd87::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5630fa7e608591ab94b1bdd6e1d9fd87::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5630fa7e608591ab94b1bdd6e1d9fd87::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5630fa7e608591ab94b1bdd6e1d9fd87::$classMap;

        }, null, ClassLoader::class);
    }
}
