<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Ljms\CoreBundle\Entity\TypeUniformSize;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadTypeUniformSizeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $sizes=array(
            'X-small',
            'Small',
            'Medium',
            'Large',
            'X-Large',
            'XX-Large',
            'XXX-Large',
        );
        foreach ($sizes as $size){
            $uniform= new TypeUniformSize();
            $uniform->setName($size);
            $uniform->setIsActive(true);
            $manager->persist($uniform);
        }
        $uniform= new TypeUniformSize();
        $uniform->setName($sizes[1]);
        $uniform->setIsActive(true);
        $this->addReference('size',$uniform);
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