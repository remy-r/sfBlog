<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\FosUser;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new FosUser();
        $userAdmin->setUsername('remi');
        $userAdmin->setPlainPassword('test');
        $userAdmin->setEnabled(1);
        $userAdmin->setRoles(array("ROLE_SUPER_ADMIN"));
        $userAdmin->setEmail("remi-raynaldy@anakrys.fr");
        $manager->persist($userAdmin);
        $manager->flush();
    }
}
