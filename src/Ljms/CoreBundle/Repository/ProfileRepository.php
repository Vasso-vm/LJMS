<?php
	namespace Ljms\CoreBundle\Repository;

    use Doctrine\ORM\Tools\Pagination\Paginator;
	use Doctrine\ORM\EntityRepository;
    use Symfony\Component\Validator\Constraints\Null;


    class ProfileRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'profile';

        /**
         * Find Guardians for guardians grid
         * @param array $filter
         * @param int $page
         * @param int $limit
         * @return bool|Paginator
         */
        public function findGuardians($filter,$page,$limit,$id=''){
            if ($page<=0 or $limit<0){
                return false;
            }
            if ($limit>0){
                $page=($page-1)*$limit;
            }
            $query = $this->createQueryBuilder(self::TABLE_ALIAS)
                ->where(self::TABLE_ALIAS.'.guardian_role=1')
                ->orderBy(self::TABLE_ALIAS.'.id','ASC');
            switch ($filter['status']){
                case 'active':
                    $query->andwhere(self::TABLE_ALIAS.'.is_active=1');
                    break;
                case 'inactive':
                    $query->andwhere(self::TABLE_ALIAS.'.is_active=0');
                    break;
            }
            if ($id!==''){
                $query->andwhere(self::TABLE_ALIAS.".id='$id'");
            }
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
		}
        public function findGuardian($filter,$page,$limit){

        }
        /**
         * Find Users for system users grid
         * @param array $filter
         * @param int $page
         * @param int $limit
         * @return bool|Paginator
         */

        public function findUsers($filter,$page,$limit){
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
            $where='p.is_active<>:status';
            $join=null;
            if($filter['division']!='all'){
                $where='(p.is_active<>:status and d.name=:division)';
                $join='JOIN p.divisions d';
            }
            $dql="SELECT p FROM Ljms\CoreBundle\Entity\Profile p ".$join." WHERE ".$where." ORDER BY p.id ASC";
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