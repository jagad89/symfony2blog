<?php
namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository {
    
    protected function getQueryBuilder()
    {
        $qb = $this->getEntityManager()
                ->getRepository('ModelBundle:Post')
                ->createQueryBuilder('p');
        
        return $qb;
    }
    
    /**
     * 
     * @param integer $num
     * @return array
     */
    public function findLatest($num) {
        $qb = $this->getQueryBuilder()
                ->orderBy('p.createdAt','desc')
                ->setMaxResults($num);
        
        return $qb->getQuery()->getResult();
    }
    
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
             ->orderBy('p.id','asc')
             ->setMaxResults(1);
        
        return $qb->getQuery()->getSingleResult();                
    }
}
