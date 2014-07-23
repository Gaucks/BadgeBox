<?php

namespace BadgeBox\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        // Create User

        // BadgeBox
        $user = $userManager->createUser();
        $user->setUsername('BadgeBox');
        $user->setEmail('challenge@badgebox.com');
        $user->setPlainPassword('0000');
        $user->setEnabled(true);

        // John Doe
        $user1 = $userManager->createUser();
        $user1->setUsername('Amandine');
        $user1->setEmail('Amandine@do.com');
        $user1->setPlainPassword('0000');
        $user1->setAvatar('amandine.jpg');
        $user->setEnabled(true);

        // Paulo
        $user2 = $userManager->createUser();
        $user2->setUsername('Paulo');
        $user2->setEmail('Paulo@do.com');
        $user2->setPlainPassword('0000');
        $user->setEnabled(true);

        // On sauvegarde en mémoires
        $manager->persist($user);
        $manager->persist($user1);
        $manager->persist($user2);

        // Enregistrement
        $manager->flush();

        //Ajout des références pour les données à enregistrer
        $this->addReference('user-0', $user);
        $this->addReference('user-1', $user1);
        $this->addReference('user-2', $user2);

    }

    public function getOrder()
    {
        return 1;
    }

}