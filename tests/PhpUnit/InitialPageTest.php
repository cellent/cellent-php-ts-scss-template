<?php
namespace PhpTemplate\Test;


use PhpTemplate\Test\WebTestCase;

class InitialPageTest extends WebTestCase
{
    public function testInitialPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $response = $client->getResponse();
        $pageContent = $response->getContent();

        $this->assertTrue($response->isOk());
        $this->assertContains('Hello World', $pageContent);
        $this->assertCount(1, $crawler->filter('nav'));
        $this->assertCount(3, $crawler->filter('nav a'));
    }
}
