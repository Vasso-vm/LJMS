<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;

	class PlayerRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'player';
		public function findPlayers($filter,$page,$limit)
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
            $dql="SELECT p FROM Ljms\CoreBundle\Entity\Player p WHERE p.is_active<>:status ORDER BY p.id ASC";
            $query = $this->getEntityManager()->createQuery($dql)
                ->setParameter('status',$status);
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
		}   

	}


?>