<?php
namespace PhpTemplate\Test\Controller;


use PhpTemplate\Test\WebTestCase;

class BlogTest extends WebTestCase
{
    public function testBlogPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/blog/');

        $response = $client->getResponse();

        $this->assertTrue($response->isOk());
        $this->assertCount(2, $crawler->filter('.blog-entries li'));
    }
}
