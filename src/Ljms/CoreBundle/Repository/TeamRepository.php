<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;

	class TeamRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'team';
		public function findTeams($filter,$page,$limit)
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
            $where='t.is_active<>:status';
            $join=null;
            if($filter['division']!='all'){
                $where='(t.is_active<>:status and d.name=:division)';
                $join='JOIN t.divisions d';
            }
            $dql="SELECT t FROM Ljms\CoreBundle\Entity\Team t ".$join." WHERE ".$where." ORDER BY t.id ASC";
            $query = $this->getEntityManager()->createQuery($dql);
            $query->setParameter('status',$status);
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
		 
	}


?>