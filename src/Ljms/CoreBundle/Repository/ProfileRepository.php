<?php
	namespace Ljms\CoreBundle\Repository;

    use Doctrine\ORM\Tools\Pagination\Paginator;
	use Doctrine\ORM\EntityRepository;
    use Symfony\Component\Validator\Constraints\Null;


    class ProfileRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'profile';

        /**
         * Find guardians for Guardians grid
         * @param string $filter
         * @param int $page
         * @param int $limit
         * @param string $id
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
                ->leftJoin(self::TABLE_ALIAS.'.roles','role')
                ->where("role.name='Guardian'")
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
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS)
                ->orderBy(self::TABLE_ALIAS.'.id','ASC');
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
            $qb->where(self::TABLE_ALIAS.".is_active!='$status'");
            if($filter['division']!='all'){
                $division=$filter['division'];
                $qb->leftJoin(self::TABLE_ALIAS.'.divisions','d')
                    ->andWhere("d.name='$division");
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