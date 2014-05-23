<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;

	class TeamRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'team';

        /**
         * Find teams for team grid
         * @param string $filter
         * @param int $page
         * @param int $limit
         * @param int $director_id
         * @param int $coach_id
         * @param int $manager_id
         * @return bool|Paginator
         */
        public function findTeams($filter,$page,$limit,$director_id,$coach_id,$manager_id)
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
                ->orderBy(self::TABLE_ALIAS.'.id','DESC')
                ->where(self::TABLE_ALIAS.".is_active!='$status'");
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            if($filter['division']!='all'){
                $division=$filter['division'];
                $query->leftJoin(self::TABLE_ALIAS.'.division','d')
                    ->andwhere("d.name='$division'");
            }
            if (!($coach_id===null and $manager_id===null and $director_id===null)){
                $where="(";
                if ($director_id!==null){
                    $where=$where."profile.id='$director_id'";
                }
                if ($manager_id!==null){
                    if ($director_id!==null){
                        $where=$where. " OR manager.id='$manager_id'";
                    }else{
                        $where=$where."manager.id='$manager_id'";
                    }
                }
                if ($coach_id!==null and $manager_id===null and $director_id===null){
                    $where=$where."coach.id='$coach_id'";
                }else{
                    $where=$where." OR coach.id='$coach_id'";
                }
                $where=$where.")";
                $query->andwhere($where);
            }
            $query->leftJoin(self::TABLE_ALIAS.'.division','division')
                ->leftJoin('division.profile','profile')
                ->leftJoin(self::TABLE_ALIAS.'.coach_profile','coach')
                ->leftJoin(self::TABLE_ALIAS.'.manager_profile','manager');
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
		}   
		 
	}


?>