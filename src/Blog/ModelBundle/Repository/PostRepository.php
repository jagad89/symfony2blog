<?php
namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository {
    
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
    
    protected function getQueryBuilder()
    {
        $qb = $this->getEntityManager()
                ->getRepository('ModelBundle:Post')
                ->createQueryBuilder('p');
        
        return $qb;
    }
}
