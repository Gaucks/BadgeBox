<?php

namespace BadgeBox\BadgeBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Challenge
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BadgeBox\BadgeBoxBundle\Entity\ChallengeRepository")
 */
class Challenge
{
    /**
     * @ORM\ManyToOne(targetEntity="BadgeBox\UserBundle\Entity\User")
     *
     */
    private $user;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="ipadress", nullable=true)
     */
    private $ipadress;

    /**
     * @var integer
     *
     * @ORM\Column(name="points")
     */
    private $points;

    /**
     * @var integer
     *
     * @ORM\Column(name="participants")
     */
    private $participants;

    /**
     * @var integer
     *
     * @ORM\Column(name="reussit")
     */
    private $reussit;

    /**
     * @var integer
     *
     * @ORM\Column(name="echec")
     */
    private $echec;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stop", type="datetime")
     */
    private $stop;

    /**
     * @var \boolean
     *
     * @ORM\Column(name="enable", type="boolean")
     */
    private $enabled;



    public function __construct()
    {
        $this->date         = new \DateTime();
        $this->points       = 10;
        $this->echec        = 0;
        $this->reussit      = 0;
        $this->participants = 0;
        $this->stop         = new \DateTime();
        $this->enabled      = TRUE;
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
     * Set title
     *
     * @param string $title
     * @return Challenge
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Challenge
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Challenge
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
     * Set ipadress
     *
     * @param string $ipadress
     * @return Challenge
     */
    public function setIpadress($ipadress)
    {
        $this->ipadress = $ipadress;

        return $this;
    }

    /**
     * Get ipadress
     *
     * @return string 
     */
    public function getIpadress()
    {
        return $this->ipadress;
    }

    /**
     * Set user
     *
     * @param \BadgeBox\UserBundle\Entity\User $user
     * @return Challenge
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
     * Set points
     *
     * @param string $points
     * @return Challenge
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return string 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set participants
     *
     * @param string $participants
     * @return Challenge
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;

        return $this;
    }

    /**
     * Get participants
     *
     * @return string 
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Set reussit
     *
     * @param string $reussit
     * @return Challenge
     */
    public function setReussit($reussit)
    {
        $this->reussit = $reussit;

        return $this;
    }

    /**
     * Get reussit
     *
     * @return string 
     */
    public function getReussit()
    {
        return $this->reussit;
    }

    /**
     * Set echec
     *
     * @param string $echec
     * @return Challenge
     */
    public function setEchec($echec)
    {
        $this->echec = $echec;

        return $this;
    }

    /**
     * Get echec
     *
     * @return string 
     */
    public function getEchec()
    {
        return $this->echec;
    }

    /**
     * Set stop
     *
     * @param \DateTime $stop
     * @return Challenge
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return \DateTime 
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Challenge
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
