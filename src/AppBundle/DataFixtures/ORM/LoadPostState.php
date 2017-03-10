<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\PostState;

class LoadPostStateData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $postState = new PostState();
        $postState->setLibelle('Brouillon');

        $manager->persist($postState);

        $postState = new PostState();
        $postState->setLibelle('En Ligne');

        $manager->persist($postState);
        $manager->flush();
    }
}
