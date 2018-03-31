<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9eed2c4df342ec7cf40751a56edfb3d
{
    public static $files = array (
        '04c6c5c2f7095ccf6c481d3e53e1776f' => __DIR__ . '/..' . '/mustangostang/spyc/Spyc.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Cache\\' => 22,
            'DeviceDetector\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'DeviceDetector\\' => 
        array (
            0 => __DIR__ . '/..' . '/piwik/device-detector',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9eed2c4df342ec7cf40751a56edfb3d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9eed2c4df342ec7cf40751a56edfb3d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}