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
        if($filter['division']!='all'){
            $division=$filter['division'];
            $qb->where(" d.name ='$division'");
        }
        return $qb->getQuery()->getResult();
    }

}
?>