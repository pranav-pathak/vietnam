<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b2c838afb99a1433ddf6eec90bc7e2c
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FacebookAds\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FacebookAds\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/php-ads-sdk/src/FacebookAds',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9b2c838afb99a1433ddf6eec90bc7e2c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9b2c838afb99a1433ddf6eec90bc7e2c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}