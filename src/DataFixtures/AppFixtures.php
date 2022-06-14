<?php
namespace App\DataFixtures;

use App\Entity\Author;
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
    
    public function load(ObjectManager $manager): void
    {
        $output = new ConsoleOutput();
        $faker = Factory::create('ru_RU');
        
        for ($i=0; $i < $this->numAuthors; $i++){
            $gender = $faker->randomElement(['M','F']);
            $author = new Author();
            $author->setFullname($faker->name($gender));
            $manager->persist($author);
        }
        $manager->flush();
        $output->writeln(" V -> $this->numAuthors Authors have been inserted !");
    }
}
