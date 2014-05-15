<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AuthorController extends Controller
{
    /**
     * 
     * @param string $slug
     * @return array
     * @Route("/author/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getDoctrine()->getManager()
                ->getRepository('ModelBundle:Author')
                ->findOneBy(array('slug'=>$slug));
        
        if($author == null)
        {
            throw $this->createNotFoundException('Author can not found');
        }
        
        $posts = $author->getPosts();
        return array('author'=>$author , 'posts'=> $posts);
    }
    

}
