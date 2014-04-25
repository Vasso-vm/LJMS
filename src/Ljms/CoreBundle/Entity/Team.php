<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 *@ORM\Entity
	 *@ORM\Table(name="Team")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\TeamRepository")
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
     */
	protected $name;

	/**
     * @ORM\Column(type="boolean" , options={"default" = 0})
     */
	protected $traveling;

	/**
     * @ORM\Column(type="boolean" , options={"default" = 1})
     */
	protected $is_active;
	/**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Division")
     * @ORM\JoinColumn(name="division_id", referencedColumnName="id")
     */
    protected $division;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile")
     * @ORM\JoinColumn(name="coach_profile_id", referencedColumnName="id")
     */
    protected $coach_profile;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile")
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
     * @ORM\OneToMany(targetEntity="PlayerXteam", mappedBy="team")
     */
    protected $team_players;
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
        $this->home_games = new \Doctrine\Common\Collections\ArrayCollection();
        $this->visiting_games = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add team_players
     *
     * @param \Ljms\CoreBundle\Entity\PlayerXteam $teamPlayers
     * @return Team
     */
    public function addTeamPlayer(\Ljms\CoreBundle\Entity\PlayerXteam $teamPlayers)
    {
        $this->team_players[] = $teamPlayers;

        return $this;
    }

    /**
     * Remove team_players
     *
     * @param \Ljms\CoreBundle\Entity\PlayerXteam $teamPlayers
     */
    public function removeTeamPlayer(\Ljms\CoreBundle\Entity\PlayerXteam $teamPlayers)
    {
        $this->team_players->removeElement($teamPlayers);
    }

    /**
     * Get team_players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamPlayers()
    {
        return $this->team_players;
    }
}
