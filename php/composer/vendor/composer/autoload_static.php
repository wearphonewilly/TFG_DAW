<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6b354e445a23cbf3b9063342fc1e68c
{
    public static $files = array (
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
        ),
        'G' => 
        array (
            'GrahamCampbell\\ResultType\\' => 26,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'GrahamCampbell\\ResultType\\' => 
        array (
            0 => __DIR__ . '/..' . '/graham-campbell/result-type/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'SEOstats\\' => 
            array (
                0 => __DIR__ . '/..' . '/seostats/seostats',
            ),
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'GTB_Exception' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'GTB_Helper' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'GTB_PageRank' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'GTB_Request' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'GTB_awesomeHash' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'GTB_ieHash' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'GTB_jenkinsHash' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'Services_JSON' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/JSON.php',
        'Services_JSON_Error' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/JSON.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
        'pref' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
        'tbr' => __DIR__ . '/..' . '/seostats/seostats/SEOstats/Services/3rdparty/GTB_PageRank.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6b354e445a23cbf3b9063342fc1e68c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6b354e445a23cbf3b9063342fc1e68c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd6b354e445a23cbf3b9063342fc1e68c::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd6b354e445a23cbf3b9063342fc1e68c::$classMap;

        }, null, ClassLoader::class);
    }
}
