<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ScheduleRepository extends EntityRepository
{
    const TABLE_ALIAS = 'ScheduleGame';

    /**
     * Find schedules for schedule grid
     * @param string $filter
     * @param int $page
     * @param int $limit
     * @param int $coach_id
     * @param int $manager_id
     * @return bool|Paginator
     */
    public function findSchedules($filter,$page,$limit,$coach_id,$manager_id)
    {
        if (intval($page)<=0 or (intval($limit)<=0 and $limit!='all')){
            return false;
        }
        if ($limit>0){
            $page=($page-1)*$limit;
        }
        $query = $this->createQueryBuilder(self::TABLE_ALIAS)
            ->leftJoin(self::TABLE_ALIAS.'.home_team','home')
            ->leftJoin(self::TABLE_ALIAS.'.visiting_team','visiting');
        if ($limit!='all'){
            $query->setFirstResult($page);
            $query->setMaxResults($limit);
        }
        if ($manager_id!==null and $coach_id!==null){
            $query->leftJoin('home.manager_profile','home_manager')
                ->leftJoin('visiting.manager_profile','visiting_manager')
                ->leftJoin('home.coach_profile','home_coach')
                ->leftJoin('visiting.coach_profile','visiting_coach')
                ->where("((home_manager.id ='$manager_id' OR visiting_manager.id ='$manager_id') OR (home_coach.id ='$coach_id' OR visiting_coach.id ='$coach_id'))");
        }
        if ($manager_id===null and $coach_id!==null){
            $query->leftJoin('home.coach_profile','home_coach')
                ->leftJoin('visiting.coach_profile','visiting_coach')
                ->where("(home_coach.id ='$coach_id' OR visiting_coach.id ='$coach_id')");
        }
        if ($manager_id!==null and $coach_id===null){
            $query->leftJoin('home.manager_profile','home_manager')
                ->leftJoin('visiting.manager_profile','visiting_manager')
                ->where("(home_manager.id ='$manager_id' OR visiting_manager.id ='$manager_id')");
        }
        if ($limit!='all'){
            $query->setFirstResult($page);
            $query->setMaxResults($limit);
        }
        if($filter['division']!='all'){
            $division=$filter['division'];
            $query->leftJoin('home.division','d')
                ->andwhere("d.name='$division'");
        }
        $paginator = new Paginator($query, $fetchJoinCollection = true);
        Return $paginator;
    }

    /**
     * Get Schedule for schedule datepicker
     * @param int $y - year
     * @param int $m - month
     * @return array
     */
    public function getSchedules($y,$m){
        $qb=$this->createQueryBuilder(self::TABLE_ALIAS);
        $qb->select('DAY('.self::TABLE_ALIAS.'.date)as date');
        $qb->where("YEAR(".self::TABLE_ALIAS.".date)='$y'");
        $qb->andwhere("MONTH(".self::TABLE_ALIAS.".date)='$m'");
        $qb->distinct();
        $qb->orderBy(self::TABLE_ALIAS.'.date');
        return $qb->getQuery()->getArrayResult();
    }

    /**
     * Get games for date
     * @param string $y - year
     * @param string $m - month
     * @param string $d - day
     * @return array
     */
    public function findGames($y,$m,$d){
        $qb=$this->createQueryBuilder(self::TABLE_ALIAS);
        $qb->where("YEAR(".self::TABLE_ALIAS.".date)='$y'");
        $qb->andwhere("MONTH(".self::TABLE_ALIAS.".date)='$m'");
        $qb->andwhere("DAY(".self::TABLE_ALIAS.".date)='$d'");
        $qb->orderBy(self::TABLE_ALIAS.'.date');
        return $qb->getQuery()->getResult();
    }
}
?>