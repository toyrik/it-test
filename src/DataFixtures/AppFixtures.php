<?php
namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Description of AppFixtures
 *
 * @author toyrik
 */
class AppFixtures extends Fixture
{
    private $numAuthors = 25;
    private $numBooks = 50;

    public function load(ObjectManager $manager): void
    {
        $output = new ConsoleOutput();
        $faker = Factory::create('ru_RU');
        $authors = [];
        
        for ($i=0; $i < $this->numAuthors; $i++){
            $gender = $faker->randomElement(['M','F']);
            $author = new Author();
            $author->setFullname($faker->name($gender));
            $manager->persist($author);
            $authors[] = $author;
        }
        $manager->flush();
        $output->writeln(" Done -> $this->numAuthors Authors have been inserted !");
        
        for ($i=0; $i < $this->numBooks; $i++){
            $book = new Book();
            $book->setTitle($faker->sentence(6, true));
            $bookAuthors = $faker->randomElements($authors, $faker->numberBetween(1,3));
            foreach ($bookAuthors as $auth) {
                $book->addAuthor($auth);
            }
            $manager->persist($book);
        }
        $manager->flush();
        $output->writeln(" Done -> $this->numBooks Books have been inserted !");
    }
}
