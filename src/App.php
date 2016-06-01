<?php
namespace PhpTemplate;

use Igorw\Silex\ConfigServiceProvider;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use PhpTemplate\Controller\Provider\Blog as BlogProvider;

class App
{
    public static function createApplication()
    {
        // setup application
        $app = new Application();

        // register service providers
        $app->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__ . '/../views',
        ));

        // config service provider
        $env = getenv('APP_ENV') ?: 'production';
        $distConfigFile = __DIR__ . "/../config/{$env}.php";
        $localConfigFile = __DIR__ . "/../config/local.php";
        if (file_exists($distConfigFile)) {
            $app->register(new ConfigServiceProvider($distConfigFile));
        }
        if (file_exists($localConfigFile)) {
            $app->register(new ConfigServiceProvider($localConfigFile));
        }

        // mount controller providers
        $app->mount("/blog", new BlogProvider());

        // set up simple route instead of using a controller provider
        $app->get('/', function () use ($app) {
            return $app['twig']->render('index.twig');
        });

        return $app;
    }
}
