<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;

	class DivisionRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'division';
		public function findDivisions($filter)
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
            if($filter['division']!='all'){
                $division=$filter['division'];
                $qb->where(self::TABLE_ALIAS.".name ='$division'");
            }
			$qb->andwhere($where);
			return $qb->getQuery()->getResult();	
		}
        public function getTeams($id){
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            $qb->leftJoin(self::TABLE_ALIAS.'.teams','teams');
            $qb->add('select','teams.id,teams.name');
            $qb->add('where',self::TABLE_ALIAS.'.id ='.$id);
            return $qb->getQuery()->getArrayResult();
        }
        public function getDivisionList()
        {
            $qb = $this->createQueryBuilder(self::TABLE_ALIAS);
            $qb->add('select',self::TABLE_ALIAS.'.name');
            return $qb->getQuery()->getArrayResult();
        }
		public function getDivisions()
        {
            $qb = $this->createQueryBuilder('d');
            $qb->select('d.id,d.name');
            return $qb->getQuery()->getArrayResult();
        }
	}


?>