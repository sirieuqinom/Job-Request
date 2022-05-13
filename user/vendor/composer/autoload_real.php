<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6627ec31d6454c1b4d1eea88477ee5ef
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit6627ec31d6454c1b4d1eea88477ee5ef', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6627ec31d6454c1b4d1eea88477ee5ef', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6627ec31d6454c1b4d1eea88477ee5ef::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
