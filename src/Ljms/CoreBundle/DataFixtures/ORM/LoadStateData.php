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
        $this->addReference('state', $state);
        $states=array(
             'Alaska'
            ,'Arizona'
            ,'Arkansas'
            ,'California'
            ,'Colorado'
            ,'Connecticut'
            ,'Delaware'
            ,'District of Columbia'
            ,'Florida'
            ,'Georgia'
            ,'Hawaii'
            ,'Idaho'
            ,'Illinois'
            ,'Indiana'
            ,'Iowa'
            ,'Kansas'
            ,'Kentucky'
            ,'Lousiana'
            ,'Maine'
            ,'Maryland'
            ,'Massachusetts'
            ,'Michigan'
            ,'Minnesota'
            ,'Mississippi'
            ,'Missouri'
            ,'Montana'
            ,'Nebraska'
            ,'Nevada'
            ,'New Hampshire'
            ,'New Jersey'
            ,'New Mexico'
            ,'New York'
            ,'North Carolina'
            ,'North Dakota'
            ,'Ohio'
            ,'Oklahoma'
            ,'Oregon'
            ,'Pennsylvania'
            ,'Rhode Island'
            ,'South Carolina'
            ,'South Dakota'
            ,'Tennessee'
            ,'Texas'
            ,'Utah'
            ,'Vermont'
            ,'Virginia'
            ,'Washington'
            ,'West Virginia'
            ,'Wisconsin'
            ,'Wyoming'
        );
        foreach ($states as $state){
            $row=new State();
            $row->setName($state);
            $manager->persist($row);
        }
        $manager->flush();
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