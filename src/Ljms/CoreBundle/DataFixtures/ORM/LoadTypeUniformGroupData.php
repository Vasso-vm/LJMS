<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Ljms\CoreBundle\Entity\TypeUniformGroup;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadTypeUniformGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $types=array(
            'Youth',
            'Adult',
        );
        foreach ($types as $type){
            $uniform = new TypeUniformGroup();
            $uniform->setName($type);
            $uniform->setIsActive(true);
            $manager->persist($uniform);
        }
        $uniform = new TypeUniformGroup();
        $uniform->setName($types[1]);
        $uniform->setIsActive(true);
        $this->addReference('type',$uniform);
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