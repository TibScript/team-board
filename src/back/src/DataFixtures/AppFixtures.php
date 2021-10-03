<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{

    /** @var Generator */
    protected $faker;

    protected $gnTree = [];

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        $user = [];
        $how_much_member = 10;
        for ($i_member = 0; $i_member < $how_much_member; $i_member++) {
            $user[] = new Member();
            $user[$i_member]->setName($this->faker->name());
        }

        for ($i_member = 0; $i_member < $how_much_member; $i_member++) {
            $manager->persist($user[$i_member]);
        }

        $manager->flush();
    }
}
