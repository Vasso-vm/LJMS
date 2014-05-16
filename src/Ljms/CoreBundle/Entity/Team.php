<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="Team")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\TeamRepository")
     * @UniqueEntity(
     *      fields = "name",
     *      message = "This Team name is already used."
     * )
	 */
	class Team
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	/**
     * @ORM\Column(type="string", length=100 , unique=true)
     * @Assert\NotBlank(message="Field Division name is required.")
     * @Assert\Length(
     *     max = "100"
     * )
     */
	protected $name;

	/**
     * @ORM\Column(type="boolean" , options={"default" = 0})
     * @Assert\NotBlank(message="Field is Visitor is required.")
     */
	protected $traveling;

	/**
     * @ORM\Column(type="boolean" , options={"default" = 1})
     * @Assert\NotBlank(message="Field is Active is required.")
     */
	protected $is_active;
	/**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Division", inversedBy="teams")
     * @ORM\JoinColumn(name="division_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Field Division is required.")
     */
    protected $division;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile", inversedBy="coach_teams")
     * @ORM\JoinColumn(name="coach_profile_id", referencedColumnName="id")
     */
    protected $coach_profile;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile", inversedBy="manager_teams")
     * @ORM\JoinColumn(name="manager_profile_id", referencedColumnName="id")
     */
    protected $manager_profile;

    /**
     * @ORM\OneToMany(targetEntity="Schedule", mappedBy="home_team")
     */
    protected $home_games;

    /**
     * @ORM\OneToMany(targetEntity="Schedule", mappedBy="visiting_team")
     */
    protected $visiting_games;

    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team",cascade={"persist"})
     */
    protected $players;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set traveling
     *
     * @param boolean $traveling
     * @return Team
     */
    public function setTraveling($traveling)
    {
        $this->traveling = $traveling;

        return $this;
    }

    /**
     * Get traveling
     *
     * @return boolean 
     */
    public function getTraveling()
    {
        return $this->traveling;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Team
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set division
     *
     * @param \Ljms\CoreBundle\Entity\Division $division
     * @return Team
     */
    public function setDivision(\Ljms\CoreBundle\Entity\Division $division = null)
    {
        $this->division = $division;

        return $this;
    }

    /**
     * Get division
     *
     * @return \Ljms\CoreBundle\Entity\Division 
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Set coach_profile
     *
     * @param \Ljms\CoreBundle\Entity\Profile $coachProfile
     * @return Team
     */
    public function setCoachProfile(\Ljms\CoreBundle\Entity\Profile $coachProfile = null)
    {
        $this->coach_profile = $coachProfile;

        return $this;
    }

    /**
     * Get coach_profile
     *
     * @return \Ljms\CoreBundle\Entity\Profile 
     */
    public function getCoachProfile()
    {
        return $this->coach_profile;
    }

    /**
     * Set manager_profile
     *
     * @param \Ljms\CoreBundle\Entity\Profile $managerProfile
     * @return Team
     */
    public function setManagerProfile(\Ljms\CoreBundle\Entity\Profile $managerProfile = null)
    {
        $this->manager_profile = $managerProfile;

        return $this;
    }

    /**
     * Get manager_profile
     *
     * @return \Ljms\CoreBundle\Entity\Profile 
     */
    public function getManagerProfile()
    {
        return $this->manager_profile;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->home_games = new ArrayCollection();
        $this->visiting_games = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    /**
     * Add home_games
     *
     * @param \Ljms\CoreBundle\Entity\Schedule $homeGames
     * @return Team
     */
    public function addHomeGame(\Ljms\CoreBundle\Entity\Schedule $homeGames)
    {
        $this->home_games[] = $homeGames;

        return $this;
    }

    /**
     * Remove home_games
     *
     * @param \Ljms\CoreBundle\Entity\Schedule $homeGames
     */
    public function removeHomeGame(\Ljms\CoreBundle\Entity\Schedule $homeGames)
    {
        $this->home_games->removeElement($homeGames);
    }

    /**
     * Get home_games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHomeGames()
    {
        return $this->home_games;
    }

    /**
     * Add visiting_games
     *
     * @param \Ljms\CoreBundle\Entity\Schedule $visitingGames
     * @return Team
     */
    public function addVisitingGame(\Ljms\CoreBundle\Entity\Schedule $visitingGames)
    {
        $this->visiting_games[] = $visitingGames;

        return $this;
    }

    /**
     * Remove visiting_games
     *
     * @param \Ljms\CoreBundle\Entity\Schedule $visitingGames
     */
    public function removeVisitingGame(\Ljms\CoreBundle\Entity\Schedule $visitingGames)
    {
        $this->visiting_games->removeElement($visitingGames);
    }

    /**
     * Get visiting_games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisitingGames()
    {
        return $this->visiting_games;
    }


    /**
     * Add players
     *
     * @param \Ljms\CoreBundle\Entity\Player $players
     * @return Team
     */
    public function addPlayer(\Ljms\CoreBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \Ljms\CoreBundle\Entity\Player $players
     */
    public function removePlayer(\Ljms\CoreBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
