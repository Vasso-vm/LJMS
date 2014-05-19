<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;

	class PlayerRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'player';

        /**
         * @param string $filter
         * @param int $page
         * @param int $limit
         * @param int $guardian_id
         * @param int $coach_id
         * @return bool|Paginator
         */
        public function findPlayers($filter,$page,$limit,$guardian_id,$coach_id)
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
            $query = $this->createQueryBuilder('p');
            if ($guardian_id!==null and $coach_id!==null){
                $query->leftJoin('p.profile','profile')
                    ->leftJoin('p.team','t')
                    ->leftJoin('t.coach_profile','coach')
                    ->where("(profile.id ='$guardian_id' or coach.id ='$coach_id')");
            }else{
                if ($guardian_id!==null){
                    $query->leftJoin('p.profile','profile')
                        ->where("profile.id='$guardian_id'");
                }
                if ($coach_id!==null){
                    $query->leftJoin('p.team','t')
                        ->leftJoin('t.coach_profile','coach')
                        ->where("coach.id = '$coach_id'");
                }
            }
            $query->select('p')
                ->andwhere("p.is_active!='$status'");
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
		}   

	}


?>