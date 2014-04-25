<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;

	class TeamRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'team';
		public function findTeams($filter)
		{
            switch ($filter['status']){
					case 'active':
						$where=self::TABLE_ALIAS.'.is_active=1';
						break;
					case 'inactive':
						$where=self::TABLE_ALIAS.'.is_active=0';
						break;
					case 'all':
						$where=self::TABLE_ALIAS.'.is_active<>2';
						break;
					default:
						return false;
				}
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            $qb->leftJoin(self::TABLE_ALIAS.'.division','d');
            if($filter['division']!='all'){
                $division=$filter['division'];
                $qb->where(" d.name ='$division'");
            }
            $qb->andwhere($where);
            //$qb->andwhere('(home.practice=0 or visiting.practice=0)');
            //$qb->groupBy('home.home_team,visiting.visiting_team');
            //$qb->leftJoin(self::TABLE_ALIAS.'.visiting_games','visiting');
            //$qb->select(self::TABLE_ALIAS.',COUNT(home.id) as home_games_count,COUNT(visiting.id) as visiting_games_count');
            return $qb->getQuery()->getResult();
		}   
		 
	}


?>