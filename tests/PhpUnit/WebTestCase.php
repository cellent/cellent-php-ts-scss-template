<?php
namespace PhpTemplate\Test;


use PhpTemplate\App;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class WebTestCase extends \Silex\WebTestCase
{
    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        $app = App::createApplication();
        $app['debug'] = true;

        // we don't really want HTML exceptions on the command line
        unset($app['exception_handler']);

        // simulate sessions during testing
        $app['session.test'] = true;

        return $app;
    }
}
