<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;


class ScheduleRepository extends EntityRepository
{
    const TABLE_ALIAS = 'ScheduleGame';

    public function findSchedules($filter)
    {
        $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
        $qb->leftJoin(self::TABLE_ALIAS.'.home_team','h');
        $qb->leftJoin('h.division','d');
        if(($filter['division']!==null) and ($filter['division']!='all') ){
            $division=$filter['division'];
            $qb->andwhere(" d.name ='$division'");
        }
        return $qb->getQuery()->getResult();
    }
    public function getSchedules($y,$m){
        $qb=$this->createQueryBuilder(self::TABLE_ALIAS);
        $qb->select('DAY('.self::TABLE_ALIAS.'.date)as date');
        $qb->where("YEAR(".self::TABLE_ALIAS.".date)='$y'");
        $qb->andwhere("MONTH(".self::TABLE_ALIAS.".date)='$m'");
        $qb->distinct();
        $qb->orderBy(self::TABLE_ALIAS.'.date');
        return $qb->getQuery()->getArrayResult();
    }
}
?>