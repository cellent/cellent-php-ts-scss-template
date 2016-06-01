<?php
namespace PhpTemplate\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Blog
{
    protected $blogPosts = array(
        array(
            'date'      => '2016-05-04',
            'author'    => 'gscheffler',
            'title'     => 'Starting Work',
            'body'      => '...',
        ),
        array(
            'date'      => '2016-05-09',
            'author'    => 'gscheffler',
            'title'     => 'Continuing Work',
            'body'      => '...',
        ),
    );

    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('Blog/index.twig', array(
            'blog' => $this->blogPosts,
        ));
    }
}
