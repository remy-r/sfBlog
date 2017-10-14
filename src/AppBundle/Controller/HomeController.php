<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function HomeAction(Request $request)
    {
        
    	$posts = $this->get('app.posts')->getAllPosts();

        return $this->render('default/index.html.twig',array(
        	'posts' => $posts));
    }
}
