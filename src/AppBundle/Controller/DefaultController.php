<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        dump($this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findBy(array('postState' => 2)));
        return $this->render('default/index.html.twig');
    }
}
