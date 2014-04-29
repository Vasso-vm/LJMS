<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

class LocationRepository extends EntityRepository
{
    const TABLE_ALIAS = 'location';
    public function findLocations($filter)
    {
        $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
        switch ($filter['status']){
            case 'active':
                $qb->where(self::TABLE_ALIAS.'.is_active=1');
                break;
            case 'inactive':
                $qb->where(self::TABLE_ALIAS.'.is_active=0');
                break;
        }
        return $qb->getQuery()->getResult();
    }
    public function changeActive($array,$bool){

    }
}


?>