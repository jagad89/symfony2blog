<?php
namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Repository class for Author Entity
 *
 * @author JAGAD
 */
class AuthorRepository extends EntityRepository {
    
    protected function getQueryBuilder()
    {
        $qb = $this->getEntityManager()
                ->getRepository('ModelBundle:Post')
                ->createQueryBuilder('a');
        
        return $qb;
    }
    
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
                ->orderBy('a.id','asc')
                ->setMaxResults(1);
        
        return $qb->getQuery()->getSingleResult();
    }
    
}
