<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;

	class TeamRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'team';
		public function findTeams($filter)
		{
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            switch ($filter['status']){
                case 'active':
                    $qb->where(self::TABLE_ALIAS.'.is_active=1');
                    break;
                case 'inactive':
                    $qb->where(self::TABLE_ALIAS.'.is_active=0');
                    break;
            }
            $qb->leftJoin(self::TABLE_ALIAS.'.division','d');
            if(($filter['division']!==null) and ($filter['division']!='all') ){
                $division=$filter['division'];
                $qb->andwhere(" d.name ='$division'");
            }
            return $qb->getQuery()->getResult();
		}   
		 
	}


?>