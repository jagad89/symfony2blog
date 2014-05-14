<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{
    /**
     * @Route("/", name="blog_post_index")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('ModelBundle:Post')->findAll();
        $latestPosts = $this->getDoctrine()->getRepository('ModelBundle:Post')->findLatest(5);
        return array('posts'=>$posts,'latestposts'=>$latestPosts);
    }
    
    /**
     * 
     * @param type $slug
     * @return array
     * @throws Exception
     * @Route("/{slug}",name="blog_post_show")
     * @Template()
     */
    public function showAction($slug)
    {
        $post = $this->getDoctrine()->getRepository('ModelBundle:Post')->findOneBy(
                array('slug'=>$slug)
                );
        
        if($post === null)
        {
            throw $this->createNotFoundException('Post not found.');
        }
        
        return array('post' => $post);
    }
}
