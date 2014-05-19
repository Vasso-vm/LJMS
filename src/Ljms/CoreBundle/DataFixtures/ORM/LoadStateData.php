<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Ljms\CoreBundle\Entity\State;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadStateData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $state= new State();
        $state->setName('Alabama');
        $manager->persist($state);
        $manager->flush();
        $this->addReference('state', $state);
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