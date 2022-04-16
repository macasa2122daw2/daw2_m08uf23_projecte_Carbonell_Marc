<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dd7c96dbde372a35ffab2e15b119013
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Laminas\\Ldap\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Laminas\\Ldap\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-ldap/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4dd7c96dbde372a35ffab2e15b119013::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4dd7c96dbde372a35ffab2e15b119013::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}