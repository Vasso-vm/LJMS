<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

class LocationRepository extends EntityRepository
{
    const TABLE_ALIAS = 'location';
    public function findLocations($filter)
    {
        switch ($filter['status']){
            case 'active':
                $where=self::TABLE_ALIAS.'.is_active=1';
                break;
            case 'inactive':
                $where=self::TABLE_ALIAS.'.is_active=0';
                break;
            case 'all':
                $where=self::TABLE_ALIAS.'.is_active<>2';
                break;
            default:
                return false;
        }
        $qb = $this->createQueryBuilder(self::TABLE_ALIAS)
            ->where($where);
        return $qb->getQuery()->getResult();
    }
    public function changeActive($array,$bool){

    }
}


?>