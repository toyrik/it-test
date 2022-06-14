<?php

namespace App\Repository;

use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

class AuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }
    
    public function countAll(): int
    {
        $queryString = "
            SELECT count(a.id) as num
            FROM App\Entity\Author a
            ";
        $query = $this->getEntityManager()->createQuery($queryString);
        return (int) $query->getSingleScalarResut();
    }
    
    public function findAllQuery(): Query
    {
        return $this->getEntityManager()->createQuery("SELECT a FROM App\Entity\Author a");
    }
    
    public function fastSearch($search): Query
    {
        
    }
}