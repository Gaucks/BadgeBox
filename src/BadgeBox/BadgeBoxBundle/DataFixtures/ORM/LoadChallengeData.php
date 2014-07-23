<?php

namespace BadgeBox\BadgeBoxBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use BadgeBox\BadgeBoxBundle\Entity\Challenge;

class LoadChallengeData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager)
    {
        $lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 				  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
         		  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

        $challenge  = $this->createChallenge($this->getReference('user-0'),'J\'ai créer un compte','Vous avez crée votre compte.');
        $challenge2 = $this->createChallenge($this->getReference('user-0'),'Personnalisation de mon compte','Vous avez personnalisé votre compte.');
        $challenge3 = $this->createChallenge($this->getReference('user-0'),'Mon premier message', $lorem);
        $challenge4 = $this->createChallenge($this->getReference('user-0'),'Mon premier challenge', $lorem);
        $challenge5 = $this->createChallenge($this->getReference('user-0'),'Mon premier ami', $lorem);
        $challenge6 = $this->createChallenge($this->getReference('user-0'),'Ma premiere victoire', $lorem);
        $challenge7 = $this->createChallenge($this->getReference('user-0'),'Mon premier échec', $lorem);
        $challenge8 = $this->createChallenge($this->getReference('user-0'),'Au moins une personne me suit.', $lorem);

        //enregistrement
        $manager->persist($challenge);
        $manager->persist($challenge2);
        $manager->persist($challenge3);
        $manager->persist($challenge4);
        $manager->persist($challenge5);
        $manager->persist($challenge6);
        $manager->persist($challenge7);
        $manager->persist($challenge8);

        $manager->flush();
    }

    public function createChallenge($user, $title, $content)
    {
        $challenge = new Challenge;

        $challenge->setTitle($title)
                  ->setContent($content)
                  ->setUser($user);

        return $challenge;
    }

    public function getOrder()
    {
        return 2;
    }
}