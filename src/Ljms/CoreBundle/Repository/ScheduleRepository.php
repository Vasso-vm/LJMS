<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ScheduleRepository extends EntityRepository
{
    const TABLE_ALIAS = 'ScheduleGame';

    public function findSchedules($filter,$page,$limit)
    {
        if ($page<=0 or $limit<0){
            return false;
        }
        if ($limit>0){
            $page=($page-1)*$limit;
        }
        $where=null;
        if($filter['division']!='all'){
            $where='WHERE d.name=:division';
        }
        $dql="SELECT s FROM Ljms\CoreBundle\Entity\Schedule s JOIN s.home_team h JOIN h.division d ".$where." ORDER BY s.id ASC";
        $query = $this->getEntityManager()->createQuery($dql);
        if ($limit!='all'){
            $query->setFirstResult($page);
            $query->setMaxResults($limit);
        }
        if($filter['division']!='all'){
            $query->setParameter('division',$filter['division']);
        }
        $paginator = new Paginator($query, $fetchJoinCollection = true);
        Return $paginator;
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