<?php
namespace Ljms\CoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class LocationRepository extends EntityRepository
{
    const TABLE_ALIAS = 'location';
    public function findLocations($filter,$page,$limit)
    {
        if ($page<=0 or $limit<0){
            return false;
        }
        if ($limit>0){
            $page=($page-1)*$limit;
        }
        switch ($filter['status']){
            case 'active':
                $status=0;
                break;
            case 'inactive':
                $status=1;
                break;
            default:
                $status=2;
        }
        $dql="SELECT l FROM Ljms\CoreBundle\Entity\Location l WHERE l.is_active<>:status ORDER BY l.id ASC";
        $query = $this->getEntityManager()->createQuery($dql)
            ->setParameter('status',$status);
        if ($limit!='all'){
            $query->setFirstResult($page);
            $query->setMaxResults($limit);
        }
        $paginator = new Paginator($query, $fetchJoinCollection = true);
        Return $paginator;
    }
    public function changeActive($array,$bool){

    }
}


?>