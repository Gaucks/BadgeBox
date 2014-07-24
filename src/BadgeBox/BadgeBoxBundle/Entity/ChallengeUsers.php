<?php

namespace BadgeBox\BadgeBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Challenge_users
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BadgeBox\BadgeBoxBundle\Entity\ChallengeUsersRepository")
 */
class ChallengeUsers
{

    /**
     * @ORM\ManyToOne(targetEntity="BadgeBox\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="BadgeBox\BadgeBoxBundle\Entity\Challenge")
     */
    private $challenge;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    private $valid;


    public function __construct()
    {
        $this->date = new \DateTime();
        $this->valid = FALSE;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Challenge_users
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \BadgeBox\UserBundle\Entity\User $user
     * @return Challenge_users
     */
    public function setUser(\BadgeBox\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BadgeBox\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set challenge
     *
     * @param \BadgeBox\BadgeBoxBundle\Entity\Challenge $challenge
     * @return Challenge_users
     */
    public function setChallenge(\BadgeBox\BadgeBoxBundle\Entity\Challenge $challenge = null)
    {
        $this->challenge = $challenge;

        return $this;
    }

    /**
     * Get challenge
     *
     * @return \BadgeBox\BadgeBoxBundle\Entity\Challenge 
     */
    public function getChallenge()
    {
        return $this->challenge;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     * @return Challenge_users
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean 
     */
    public function getValid()
    {
        return $this->valid;
    }
}
