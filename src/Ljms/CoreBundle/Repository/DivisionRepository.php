<?php
	namespace Ljms\CoreBundle\Repository;
	use Doctrine\ORM\EntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;

	class DivisionRepository extends EntityRepository
	{
		const TABLE_ALIAS = 'division';
		public function findDivisions($filter,$page,$limit,$id=null)
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
            $query = $this->createQueryBuilder(self::TABLE_ALIAS);
            $query->where(self::TABLE_ALIAS.".is_active!='$status'");
            if ($limit!='all'){
                $query->setFirstResult($page);
                $query->setMaxResults($limit);
            }
            if($filter['division']!='all'){
                $division=$filter['division'];
                $query->andwhere(self::TABLE_ALIAS.".name='$division'");
            }
            if ($id!==null){
                $query->leftJoin(self::TABLE_ALIAS.'.profile','profile')
                    ->andwhere("profile.id='$id'");
            }
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            Return $paginator;
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