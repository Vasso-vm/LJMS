<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Ljms\CoreBundle\Entity\Address;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadAddressData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $address= new Address();
        $address->setAddress('test');
        $address->setCity('test');
        $address->setZip('123');
        $address->setState($this->getReference('state'));
        $manager->persist($address);
        $manager->flush();
        $this->addReference('address', $address);
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
?>