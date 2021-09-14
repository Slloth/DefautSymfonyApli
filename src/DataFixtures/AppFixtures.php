<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Article;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $hasher;
    private $faker;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user   ->setEmail('fiquet.noah@gmail.com')
                ->setRoles(["ROLE_ADMIN"])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setIsVerified(true);
        $password = $this->hasher->hashPassword($user,'Nono19970628');
        $user->setPassword($password);

        $manager->persist($user);
            
        for ($i=0; $i < 100; $i++){
            $article = new Article();
            $article    ->setName($this->faker->name())
                        ->setSlug($this->faker->slug())
                        ->setContent($this->faker->text())
                        ->setStatus('Publique')
                        ->setCreatedAt(new DateTimeImmutable($this->generateDateTime()))
                        ->setPublicatedAt(new \DateTime($this->generateDateTime()))
                        ->setThumbnail('84dc53c8f550b3d0bddafe9db5abc413-613b55a60ce43292322754.jpg')
                        ->setUser($user);
            $manager->persist($article);
        }

        $manager->flush();
    }

    private function generateDateTime():string {
        return $this->faker->dateTimeBetween(new \DateTime("2021-01-01"),new \DateTime("2021-12-30"))->format("Y/m/d H:i:s");
    }
}