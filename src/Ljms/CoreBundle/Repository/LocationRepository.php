<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class LocationRepository extends EntityRepository
{
    const TABLE_ALIAS = 'location';

    /**
     * @param string $filter
     * @param int $page
     * @param int $limit
     * @return bool|Paginator
     */
    public function findLocations($filter,$page,$limit)
    {
        if ($page<=0 or $limit<0){
            return false;
        }
        if ($limit>0){
            $page=($page-1)*$limit;
        }
        $qb = $this->createQueryBuilder(self::TABLE_ALIAS)
            ->orderBy(self::TABLE_ALIAS.'.id','ASC');
        switch ($filter['status']){
            case 'active':
                $qb->where(self::TABLE_ALIAS.'.is_active=1');
                break;
            case 'inactive':
                $qb->where(self::TABLE_ALIAS.'.is_active=0');
                break;
        }
        if ($limit!='all'){
            $qb->setFirstResult($page);
            $qb->setMaxResults($limit);
        }
        $paginator = new Paginator($qb, $fetchJoinCollection = true);
        Return $paginator;
    }
}


?>