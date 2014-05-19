<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Ljms\CoreBundle\Entity\Profile;
use Ljms\CoreBundle\Entity\Address;

class LoadAdminData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);

        $address= new Address();
        $address->setAddress('test');
        $address->setCity('test');
        $address->setZip('123');

        $userAdmin = new Profile();

        $password = $encoder->encodePassword('admin', $userAdmin->getSalt());

        $userAdmin->setPassword($password);
        $userAdmin->setFirstname('admin');
        $userAdmin->setLastname('admin');
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setHomePhone('123');
        $userAdmin->setAdminRole(true);
        $userAdmin->setAddress($address);

        $manager->persist($userAdmin);
        $manager->flush();
    }
}
?>