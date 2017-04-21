<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppControllerTest extends WebTestCase
{
    public function testArticles()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/articles');
    }

    public function testCart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cart');
    }

    public function testArticle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/{id}');
    }

    public function testResult()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/result');
    }

}
