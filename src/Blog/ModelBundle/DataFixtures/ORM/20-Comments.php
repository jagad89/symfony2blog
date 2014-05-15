<?php
namespace Blog\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\ModelBundle\Entity\Comment;

/**
 * Fixtures for Post Entity.
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder() {
        return 20;
    }

    public function load(ObjectManager $manager) {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();
        
        $comments = [
            "this is comment one",
            "this is comment two",
            "this is comment three",
        ];
        
        $i = 0;
        foreach($posts as $post)
        {
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);
            
            $manager->persist($comment);
        }
        
        $manager->flush();
    }
}