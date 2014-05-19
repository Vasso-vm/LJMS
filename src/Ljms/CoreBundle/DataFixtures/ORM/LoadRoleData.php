<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Ljms\CoreBundle\Entity\Role;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $role=new Role();
        $role->setName('Admin');
        $role->setRole('ROLE_ADMIN');
        $manager->persist($role);
        $this->addReference('role', $role);
        $roles=array(
            array('name'=>'Director','role'=>'ROLE_DIRECTOR'),
            array('name'=>'Coach','role'=>'ROLE_COACH'),
            array('name'=>'Manager','role'=>'ROLE_MANAGER'),
            array('name'=>'Guardian','role'=>'ROLE_GUARDIAN'),
        );
        foreach ($roles as $key){
            $role=new Role();
            $role->setName($key['name']);
            $role->setRole($key['role']);
            $manager->persist($role);
        }
        $manager->flush();
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
?>