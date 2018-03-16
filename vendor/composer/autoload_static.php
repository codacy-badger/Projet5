<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c36075426dc1e963220d485312da190
{
    public static $files = array (
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'G' => 
        array (
            'Gthareau\\' => 9,
        ),
        'E' => 
        array (
            'Entity\\' => 7,
            'Egulias\\EmailValidator\\' => 23,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Lib/Gthareau/Model',
        ),
        'Gthareau\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Lib/Gthareau',
        ),
        'Entity\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Lib/Gthareau/Entity',
        ),
        'Egulias\\EmailValidator\\' => 
        array (
            0 => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c36075426dc1e963220d485312da190::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c36075426dc1e963220d485312da190::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9c36075426dc1e963220d485312da190::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
