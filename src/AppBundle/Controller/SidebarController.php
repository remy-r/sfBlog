<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SidebarController extends Controller
{
    public function menuAction()
    {
        return $this->render('menu.html.twig');
    }


}
