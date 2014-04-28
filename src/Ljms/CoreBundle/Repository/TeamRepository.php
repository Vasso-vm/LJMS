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
            return $qb->getQuery()->getResult();
		}   
		 
	}


?>