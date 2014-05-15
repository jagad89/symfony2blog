<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorControllerTest extends WebTestCase
{
    public function testShow()
    {
        $client = static::createClient();

        /** @var Blog\ModelBundle\Entity\Author $author */
        $author = $author = $client->getContainer()
                ->get('doctrine')
                ->getManager()
                ->getRepository('ModelBundle:Author')
                ->findFirst();
        
        
        $crawler = $client->request('GET', '/author/'.$author->getSlug());
        
        $authorPostsCount = $author->getPosts()->count();
        
        $this->assertTrue($client->getResponse()->isSuccessful(),
                'Author show fails.');
        
        $this->assertCount($authorPostsCount, $crawler->filter('h2')->count(),
                'Author posts count not matched.');
    }

}
