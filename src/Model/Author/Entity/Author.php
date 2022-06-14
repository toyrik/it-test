<?php

namespace App\Model\Author\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="authors")
 */
class Author
{
    /**
     * @ORM\Column(type="author_id")
     * @ORM\Id
     */
    private Id $id;
    /**
     * @var string
     * @ORM\Column(type="string", name="name")
     */
    private string $name;
    /**
     * @var string
     * @ORM\Column(type="string", name="surname")
     */
    private string $surname;

    public function __construct(Id $id, string $name, string $surname)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    public function edit(string $name, string $surname): void
    {
        $this->name = $name;
        $this->surname = $surname;
    }
}
