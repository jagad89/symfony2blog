<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        
        $this->assertTrue($client->getResponse()->isSuccessful(),"The post index not found");
        $this->assertCount(3,$crawler->filter('h2'), 'The post count miss match');
    }

    public function testShow()
    {
        $client = static::createClient();
        
        /**
         * @var Post $post
         */
        $post = $client->getContainer()
                ->get('doctrine')
                ->getManager()
                ->getRepository('ModelBundle:Post')
                ->findFirst();
        $crawler = $client->request('GET','/'.$post->getSlug());
        
        $this->assertTrue($client->getResponse()->isSuccessful(),'Responce not successful');
        $this->assertEquals($post->getTitle(), $crawler->filter('h1')->text(),'Title mis match');
        $this->assertGreaterThanOrEqual(1, $crawler->filter('artical.comment')->count(),'No comment for post');
    }
    
    public function testCreateComment()
    {
        
    }
}
