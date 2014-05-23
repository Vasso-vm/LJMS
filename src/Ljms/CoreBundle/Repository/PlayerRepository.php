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
            if ($guardian_id!==null and $coach_id!==null){
                $query->leftJoin(self::TABLE_ALIAS.'.profile','profile')
                    ->leftJoin(self::TABLE_ALIAS.'.team','t')
                    ->leftJoin('t.coach_profile','coach')
                    ->where("(profile.id ='$guardian_id' or coach.id ='$coach_id')");
            }else{
                if ($guardian_id!==null){
                    $query->leftJoin(self::TABLE_ALIAS.'.profile','profile')
                        ->where("profile.id='$guardian_id'");
                }
                if ($coach_id!==null){
                    $query->leftJoin(self::TABLE_ALIAS.'.team','t')
                        ->leftJoin('t.coach_profile','coach')
                        ->where("coach.id = '$coach_id'");
                }
            }
            $query->select(self::TABLE_ALIAS)
                ->andwhere(self::TABLE_ALIAS.".is_active!='$status'");
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
		}   

	}


?>