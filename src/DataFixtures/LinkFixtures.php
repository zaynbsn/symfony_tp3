<?php

namespace App\DataFixtures;

use App\Entity\Link;
use App\Entity\Reaction;
use App\Entity\ReactionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    public function load(ObjectManager $manager) : void
    {
        $faker = \Faker\Factory::create();

        $date = new \DateTimeImmutable("now");

        for ($i = 0; $i < 1000; $i++) {
            $link = new Link();
            $link->setUrl($faker->url());
            $link->setTitle($faker->sentence(rand(1,8)));
            $link->setCreatedAt($date);
            $manager->persist($link);
            $date = $date->modify('-1 hour');
        }
        $manager->flush();
    }
}
