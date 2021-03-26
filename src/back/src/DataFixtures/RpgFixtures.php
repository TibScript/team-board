<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class RpgFixtures extends Fixture implements FixtureGroupInterface
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
        $expatByGroup = 2;
        $memberBySpecGroup = 5;
        $memberByMainGroup = 10;
        $mainGroup = ['automn', 'spring', 'summer', 'winter'];

        $groups = $this->makeGnTree();

        foreach($groups as $key => $group) {
            if (
                str_starts_with($key, 'expatfrom')
                && str_contains($key, 'in')
            ) {
                for ($i_member = 0; $i_member < $expatByGroup; $i_member++) {
                    $newMember = new Member();
                    $newMember->setName($this->faker->name);
                    $members[] = $newMember;
                    $group->addMember($newMember);
                }
            }
            if (
                in_array($key, $mainGroup)
            ) {
                for ($i_member = 0; $i_member < $memberByMainGroup; $i_member++) {
                    $newMember = new Member();
                    $newMember->setName($this->faker->name);
                    $group->addMember($newMember);
                }
            }
        }

        // ------------------------------------------------
        // Groupe specifique
        // ------------------------------------------------

        for ($i_member = 0; $i_member < $memberBySpecGroup; $i_member++) {
            $newMember = new Member();
            $newMember->setName($this->faker->name);
            $groups['agri']->addMember($newMember);
            if ($i_member == 0 || $i_member == 1) {
                $groups['council']->addMember($newMember);
            }
        }

        for ($i_member = 0; $i_member < $memberBySpecGroup; $i_member++) {
            $newMember = new Member();
            $newMember->setName($this->faker->name);
            $groups['builder']->addMember($newMember);
            if ($i_member == 0 || $i_member == 1) {
                $groups['council']->addMember($newMember);
            }
        }

        for ($i_member = 0; $i_member < $memberBySpecGroup; $i_member++) {
            $newMember = new Member();
            $newMember->setName($this->faker->name);
            $groups['fisher']->addMember($newMember);
            if ($i_member == 0 || $i_member == 1) {
                $groups['council']->addMember($newMember);
            }
        }

        for ($i_member = 0; $i_member < $memberBySpecGroup; $i_member++) {
            $newMember = new Member();
            $newMember->setName($this->faker->name);
            $groups['noble']->addMember($newMember);
            if ($i_member == 0 || $i_member == 1) {
                $groups['council']->addMember($newMember);
            }
        }

        // ------------------------------------------------
        // save
        // ------------------------------------------------

        foreach($groups as $group) {
            $manager->persist($group);
        }

        $manager->flush();
    }

    private function makeGnTree()
    {
        $groups = [];

        $gn = new Group();
        $gn->setName('GN');
        $gn->setImGroot(True);

        $automn = new Group();
        $automn->setName('Automn');
        $spring = new Group();
        $spring->setName('Spring');
        $summer = new Group();
        $summer->setName('Summer');
        $winter = new Group();
        $winter->setName('Winter');

        $expat = new Group();
        $expat->setName('Expat');

        $expatfromAutomn = new Group();
        $expatfromAutomn->setName('Expat from Automn');
        $expatfromAutomnInSpring = new Group();
        $expatfromAutomnInSpring->setName('Expat from Automn In Spring');
        $expatfromAutomnInSummer = new Group();
        $expatfromAutomnInSummer->setName('Expat from Automn In Summer');
        $expatfromAutomnInWinter = new Group();
        $expatfromAutomnInWinter->setName('Expat from Automn In Winter');

        $expatfromSpring = new Group();
        $expatfromSpring->setName('Expat from Spring');
        $expatfromSpringInAutomn = new Group();
        $expatfromSpringInAutomn->setName('Expat from Spring In Spring');
        $expatfromSpringInSummer = new Group();
        $expatfromSpringInSummer->setName('Expat from Spring In Summer');
        $expatfromSpringInWinter = new Group();
        $expatfromSpringInWinter->setName('Expat from Spring In Winter');

        $expatfromSummer = new Group();
        $expatfromSummer->setName('Expat from Summer');
        $expatfromSummerInAutomn = new Group();
        $expatfromSummerInAutomn->setName('Expat from Summer In Automn');
        $expatfromSummerInSpring = new Group();
        $expatfromSummerInSpring->setName('Expat from Summer In Spring');
        $expatfromSummerInWinter = new Group();
        $expatfromSummerInWinter->setName('Expat from Summer In Winter');

        $expatfromWinter = new Group();
        $expatfromWinter->setName('Expat from Winter');
        $expatfromWinterInAutomn = new Group();
        $expatfromWinterInAutomn->setName('Expat from Winter In Automn');
        $expatfromWinterInSpring = new Group();
        $expatfromWinterInSpring->setName('Expat from Winter In Spring');
        $expatfromWinterInSummer = new Group();
        $expatfromWinterInSummer->setName('Expat from Winter In Summer');

        // ------------------------------------------------
        // add expat group to global expat group
        // ------------------------------------------------

        $expatfromAutomn->addChildGroup($expatfromAutomnInSpring);
        $expatfromAutomn->addChildGroup($expatfromAutomnInSummer);
        $expatfromAutomn->addChildGroup($expatfromAutomnInWinter);

        $expatfromSpring->addChildGroup($expatfromSpringInAutomn);
        $expatfromSpring->addChildGroup($expatfromSpringInSummer);
        $expatfromSpring->addChildGroup($expatfromSpringInWinter);

        $expatfromSummer->addChildGroup($expatfromSummerInAutomn);
        $expatfromSummer->addChildGroup($expatfromSummerInSpring);
        $expatfromSummer->addChildGroup($expatfromSummerInWinter);

        $expatfromWinter->addChildGroup($expatfromWinterInAutomn);
        $expatfromWinter->addChildGroup($expatfromWinterInSpring);
        $expatfromWinter->addChildGroup($expatfromWinterInSummer);

        // ------------------------------------------------
        // add expat group in group
        // ------------------------------------------------

        $automn->addChildGroup($expatfromAutomn);
        $automn->addChildGroup($expatfromSpringInAutomn);
        $automn->addChildGroup($expatfromSummerInAutomn);
        $automn->addChildGroup($expatfromWinterInAutomn);
        
        $spring->addChildGroup($expatfromSpring);
        $spring->addChildGroup($expatfromAutomnInSpring);
        $spring->addChildGroup($expatfromSummerInSpring);
        $spring->addChildGroup($expatfromWinterInSpring);
        
        $automn->addChildGroup($expatfromSummer);
        $summer->addChildGroup($expatfromAutomnInSummer);
        $summer->addChildGroup($expatfromSpringInSummer);
        $summer->addChildGroup($expatfromWinterInSummer);        
        
        $automn->addChildGroup($expatfromWinter);
        $winter->addChildGroup($expatfromAutomnInWinter);
        $winter->addChildGroup($expatfromSpringInWinter);
        $winter->addChildGroup($expatfromSummerInWinter);

        $expat->addChildGroup($expatfromAutomn);
        $expat->addChildGroup($expatfromSpring);
        $expat->addChildGroup($expatfromSummer);
        $expat->addChildGroup($expatfromWinter);

        $gn->addChildGroup($expat);

        $gn->addChildGroup($automn);
        $gn->addChildGroup($spring);
        $gn->addChildGroup($summer);
        $gn->addChildGroup($winter);

        // ------------------------------------------------
        // specific group
        // ------------------------------------------------

        $noble = new Group();
        $noble->setName('Noble');

        $winter->addChildGroup($noble);
        
        $fisher = new Group();
        $fisher->setName('Guilde des pecheurs');
        
        $summer->addChildGroup($fisher);
        
        $builder = new Group();
        $builder->setName('Guilde des Batisseur');
        
        $summer->addChildGroup($builder);
        
        $agri = new Group();
        $agri->setName('Guilde des Agriculteurs');
        
        $summer->addChildGroup($agri);
        
        $council = new Group();
        $council->setName('Conseil de Guilde');
        
        $summer->addChildGroup($council);

        $groups['agri'] = $agri;
        $groups['builder'] = $builder;
        $groups['council'] = $council;
        $groups['fisher'] = $fisher;
        $groups['noble'] = $noble;
        
        // ------------------------------------------------
        // centralize group
        // ------------------------------------------------

        $groups['expatfromautomn'] = $expatfromAutomn;
        $groups['expatfromautomninspring'] = $expatfromAutomnInSpring;
        $groups['expatfromautomninsummer'] = $expatfromAutomnInSummer;
        $groups['expatfromautomninwinter'] = $expatfromAutomnInWinter;

        $groups['expatfromspring'] = $expatfromSpring;
        $groups['expatfromspringinautomn'] = $expatfromSpringInAutomn;
        $groups['expatfromspringinsummer'] = $expatfromSpringInSummer;
        $groups['expatfromspringinwinter'] = $expatfromSpringInWinter;

        $groups['expatfromsummer'] = $expatfromSummer;
        $groups['expatfromsummerinautomn'] = $expatfromSummerInAutomn;
        $groups['expatfromsummerinspring'] = $expatfromSummerInSpring;
        $groups['expatfromsummerinwinter'] = $expatfromSummerInWinter;

        $groups['expatfromwinter'] = $expatfromWinter;
        $groups['expatfromwinterinautomn'] = $expatfromWinterInAutomn;
        $groups['expatfromwinterinspring'] = $expatfromWinterInSpring;
        $groups['expatfromwinterinsummer'] = $expatfromWinterInSummer;

        $groups['gn'] = $gn;
        $groups['expat'] = $expat;

        $groups['automn'] = $automn;
        $groups['summer'] = $summer;
        $groups['spring'] = $spring;
        $groups['winter'] = $winter;

        return $groups;
    }

    public static function getGroups(): array
    {
        return ['rpg'];
    }
}
