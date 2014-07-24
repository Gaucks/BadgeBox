<?php

namespace BadgeBox\UserBundle\Services;
use BadgeBox\BadgeBoxBundle\Entity\ChallengeUsers;

class InitChallenge {

    /**
     * Initialise tous les challenges lors d'une inscription
     */

    protected $em;

    public function __construct($doctine)
    {
        $this->em  = $doctine->getEntityManager();
    }

    public function init($user)
    {
        $challenges = $this->em->getRepository('BadgeBoxBundle:Challenge')->findByUser(1);

        foreach($challenges as $n )
        {
            $this->make($n, $user);
        }

    }

    protected function make($challenge, $user)
    {
        $challengeUsers = new ChallengeUsers();

        $challengeUsers->setUser($user);
        $challengeUsers->setChallenge($challenge);

        $this->em->persist($challengeUsers);

        $this->em->flush();
    }
}