<?php

namespace App\Model\Author\Entity;

use App\Model\EntityNotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class AuthorRepository
{
    private $em;
    /**
     * @var EntityRepository
     */
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo =$em->getRepository(Author::class);
    }

    public function get(Id $id): Author
    {
        if (!$author = $this->repo->find($id->getValue())) {
            throw new EntityNotFoundException('Author is not found');
        }
        return $author;
    }

    public function add(Author $author): void
    {
        $this->em->persist($author);
    }
}
