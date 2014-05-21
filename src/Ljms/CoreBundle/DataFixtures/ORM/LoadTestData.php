<?php
namespace Ljms\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Ljms\CoreBundle\Entity\Profile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ljms\CoreBundle\Entity\Address;
use Ljms\CoreBundle\Entity\Division;
use Ljms\CoreBundle\Entity\Player;
use Ljms\CoreBundle\Entity\PlayerRegistration;

class LoadTestData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        for ($i=0;$i<25;$i++){

            $address= new Address();
            $address->setAddress('test');
            $address->setCity('test');
            $address->setZip('123');
            $address->setState($this->getReference('state'));
            $manager->persist($address);

            $profile=new Profile();
            $password = $encoder->encodePassword('admin', $profile->getSalt());
            $profile->setPassword($password);
            $profile->setFirstname('user'.$i);
            $profile->setLastname('user'.$i);
            $profile->setEmail('admin'.$i.'@admin.com');
            $profile->setHomePhone('123');
            $profile->addRole($this->getReference('role'));
            $profile->setAddress($address);
            $manager->persist($profile);
        }
        for ($i=0;$i<10;$i++){

            $division= new Division();
            $division->setIsActive(true);
            $division->setName($i.'U');
            $division->setMinAge($i);
            $division->setMaxAge('18');
            $division->setDescription('test');
            $division->setRules('test');
            $manager->persist($division);
        }
        for ($i=0;$i<10;$i++){

            $address= new Address();
            $address->setAddress('test');
            $address->setCity('test');
            $address->setZip('123');
            $address->setState($this->getReference('state'));
            $manager->persist($address);

            $profile=new Profile();
            $password = $encoder->encodePassword('admin', $profile->getSalt());
            $profile->setPassword($password);
            $profile->setFirstname('guardian'.$i);
            $profile->setLastname('guardian'.$i);
            $profile->setEmail('guardian'.$i.'@admin.com');
            $profile->setHomePhone('123');
            $profile->addRole($this->getReference('role'));
            $profile->setAddress($address);
            $manager->persist($profile);

            $r=new PlayerRegistration();
            $r->setJerseyName($i);
            $r->setJerseyNumber($i);
            $r->setShirtSize($this->getReference('size'));
            $r->setShortSize($this->getReference('size'));
            $r->setShirtType($this->getReference('type'));
            $r->setShortType($this->getReference('type'));

            $player=new Player();
            $player->setAddress($address);
            $player->setIsActive(true);
            $player->setFirstName('player'.$i);
            $player->setLastName('player'.$i);
            $player->setProfile($profile);
            $player->setSharesGuardianAddress(1);
            $player->setPlayerRegistration($r);
            $player->setBirthDate(0);
        }
        $manager->flush();

    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}
?>