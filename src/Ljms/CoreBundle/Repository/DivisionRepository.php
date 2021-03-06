<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;

	class DivisionRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'division';

        /**
         * @param string $filter
         * @param int $page
         * @param int $limit
         * @param int|null $id
         * @return bool|Paginator
         */
        public function findDivisions($filter,$page,$limit,$id=null)
		{
            if (intval($page)<=0 or (intval($limit)<=0 and $limit!='all')){
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
                case 'all':
                    $status=2;
                    break;
                default:
                    return false;
            }
            $query = $this->createQueryBuilder(self::TABLE_ALIAS)
                ->orderBy(self::TABLE_ALIAS.'.id','DESC');
            $query->where(self::TABLE_ALIAS.".is_active!='$status'");
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            if($filter['division']!='all'){
                $division=$filter['division'];
                $query->andwhere(self::TABLE_ALIAS.".name='$division'");
            }
            if ($id!==null){
                $query->leftJoin(self::TABLE_ALIAS.'.profile','profile')
                    ->andwhere("profile.id='$id'");
            }
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
		}

        /**
         * Get teams for division
         * @param int $id - division id
         * @return array
         */
        public function getTeams($id){
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            $qb->leftJoin(self::TABLE_ALIAS.'.teams','teams');
            $qb->select('teams.id, teams.name');
            $qb->where(self::TABLE_ALIAS.'.id ='.$id);
            return $qb->getQuery()->getArrayResult();
        }

        /**
         * Get division`s name for division filter
         * @return array
         */
        public function getDivisionList()
        {
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            $qb->select(self::TABLE_ALIAS.'.name');
            return $qb->getQuery()->getArrayResult();
        }

        /**
         * Get divisions for change director
         * @return array
         */
        public function getDivisions()
        {
            $qb = $this->createQueryBuilder('d');
            $qb->select('d.id,d.name');
            return $qb->getQuery()->getArrayResult();
        }
	}


?>