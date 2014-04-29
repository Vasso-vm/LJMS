<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Symfony\Component\Validator\Constraints\Null;

    class ProfileRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'profile';

		public function findGuardians($filter){
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            switch ($filter['status']){
                case 'active':
                    $qb->where(self::TABLE_ALIAS.'.is_active=1');
                    break;
                case 'inactive':
                    $qb->where(self::TABLE_ALIAS.'.is_active=0');
                    break;
            }
			$qb->leftJoin(self::TABLE_ALIAS.'.players','players');
            $qb->select(self::TABLE_ALIAS.',COUNT(players.id) as num_players');
            $qb->andwhere(self::TABLE_ALIAS.'.guardian_role=1');
			$qb->groupBy('players.profile');
			return $qb->getQuery()->getArrayResult();
		}   
		public function findUsers($filter){
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
			switch ($filter['status']){
					case 'active':
						$qb->where(self::TABLE_ALIAS.'.is_active=1');
						break;
					case 'inactive':
						$qb->where(self::TABLE_ALIAS.'.is_active=0');
						break;
				}
			$qb->leftJoin(self::TABLE_ALIAS.'.divisions','d');
            if(($filter['division']!==null) and ($filter['division']!='all') ){
                $division=$filter['division'];
                $qb->andwhere(" d.name ='$division'");
            }
			return $qb->getQuery()->getResult();
		} 
	}


?>