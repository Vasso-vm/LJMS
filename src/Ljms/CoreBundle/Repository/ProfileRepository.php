<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;

	class ProfileRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'profile';
		public function findGuardians($filter){
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
            $qb->leftJoin(self::TABLE_ALIAS.'.players','players');
            $qb->select(self::TABLE_ALIAS.',COUNT(players.id) as num_players');
            $qb->where($where);
            $qb->where(self::TABLE_ALIAS.'.guardian_role=1');
			$qb->groupBy('players.profile');
			return $qb->getQuery()->getArrayResult();
		}   
		public function findUsers($filter){
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
            $qb->leftJoin(self::TABLE_ALIAS.'.divisions','d');
            if($filter['division']!='all'){
                $division=$filter['division'];
                $qb->where(" d.name ='$division'");
            }
			$qb->andwhere($where)	;
			return $qb->getQuery()->getResult();
		} 
	}


?>