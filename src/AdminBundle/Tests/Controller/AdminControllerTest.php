<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testOrders()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/orders');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/articles');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/edit/{id}');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/delete/{id}');
    }

}
