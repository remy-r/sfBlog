<?php
namespace AppBundle\Services\Posts;

class PostsManager
{
    public function __construct(
        \Doctrine\ORM\EntityManager $em
      ) {
        $this->em = $em;
    }


    public function getAllPosts()
    {
       return $this->em->getRepository('AppBundle:Post')->findAll();
    }
}
