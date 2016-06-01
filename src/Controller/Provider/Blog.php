<?php
namespace PhpTemplate\Controller\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;

class Blog implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $blog = $app["controllers_factory"];
        $blog->get("/", "PhpTemplate\\Controller\\Blog::get");

        return $blog;
    }
}
