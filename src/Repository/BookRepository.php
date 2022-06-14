<?php

namespace App\Repository;


use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;


class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findAllQuery( ) :Query {
        return $this->getEntityManager()->createQuery("SELECT b FROM App\Entity\Book b");
    }

    public function countAll():int{
        $queryString = "
            SELECT count(b.id) as num
            FROM App\Entity\Book b
        ";
        $query = $this->getEntityManager()->createQuery($queryString);
        return (int) $query->getSingleScalarResult();
    }
}
