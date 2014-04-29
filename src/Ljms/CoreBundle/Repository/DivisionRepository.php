<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;

	class DivisionRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'division';
		public function findDivisions($filter)
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
            if(($filter['division']!==null) and ($filter['division']!='all') ){
                $division=$filter['division'];
                $qb->andwhere(self::TABLE_ALIAS.". name ='$division'");
            }
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