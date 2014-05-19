<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Ljms\CoreBundle\Entity\Profile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadAdminData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);

        $userAdmin = new Profile();

        $password = $encoder->encodePassword('admin', $userAdmin->getSalt());

        $userAdmin->setPassword($password);
        $userAdmin->setFirstname('admin');
        $userAdmin->setLastname('admin');
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setHomePhone('123');
        $userAdmin->setAdminRole(true);
        $userAdmin->setAddress($this->getReference('address'));
        $manager->persist($userAdmin);
        $manager->flush();
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
?>