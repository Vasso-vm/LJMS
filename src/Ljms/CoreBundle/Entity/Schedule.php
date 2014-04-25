<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 *@ORM\Entity
	 *@ORM\Table(name="ScheduleGame")
     *@ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\ScheduleRepository")
	*/
	class Schedule
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	/**
     * @ORM\Column(type="datetime")
     */
	protected $date;

	/**
     * @ORM\Column(type="string" , length=3)     
     */
	protected $home_team_score=0;

	/**
     * @ORM\Column(type="string" , length=3)     
     */
	protected $visiting_team_score=0;

    /**
     * @ORM\Column(type="boolean" , options={"default" = 0})
     */
    protected $practice;
    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
	protected $location;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="home_team_id", referencedColumnName="id")
     */
    protected $home_team;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="visiting_team_id", referencedColumnName="id")
     */
    protected $visiting_team;

        public function setDivision($date)
        {
            $this->division = $date;

            return $this;
        }
        public function getDivision()
        {
            return $this->division;
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
     * @return ScheduleGame
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
     * Set home_team_score
     *
     * @param string $homeTeamScore
     * @return ScheduleGame
     */
    public function setHomeTeamScore($homeTeamScore)
    {
        $this->home_team_score = $homeTeamScore;

        return $this;
    }

    /**
     * Get home_team_score
     *
     * @return string 
     */
    public function getHomeTeamScore()
    {
        return $this->home_team_score;
    }

    /**
     * Set visiting_team_score
     *
     * @param string $visitingTeamScore
     * @return ScheduleGame
     */
    public function setVisitingTeamScore($visitingTeamScore)
    {
        $this->visiting_team_score = $visitingTeamScore;

        return $this;
    }

    /**
     * Get visiting_team_score
     *
     * @return string 
     */
    public function getVisitingTeamScore()
    {
        return $this->visiting_team_score;
    }

    /**
     * Set location
     *
     * @param \Ljms\CoreBundle\Entity\Location $location
     * @return Schedule
     */
    public function setLocation(\Ljms\CoreBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \Ljms\CoreBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set home_team
     *
     * @param \Ljms\CoreBundle\Entity\Team $homeTeam
     * @return Schedule
     */
    public function setHomeTeam(\Ljms\CoreBundle\Entity\Team $homeTeam = null)
    {
        $this->home_team = $homeTeam;

        return $this;
    }

    /**
     * Get home_team
     *
     * @return \Ljms\CoreBundle\Entity\Team 
     */
    public function getHomeTeam()
    {
        return $this->home_team;
    }

    /**
     * Set visiting_team
     *
     * @param \Ljms\CoreBundle\Entity\Team $visitingTeam
     * @return Schedule
     */
    public function setVisitingTeam(\Ljms\CoreBundle\Entity\Team $visitingTeam = null)
    {
        $this->visiting_team = $visitingTeam;

        return $this;
    }

    /**
     * Get visiting_team
     *
     * @return \Ljms\CoreBundle\Entity\Team 
     */
    public function getVisitingTeam()
    {
        return $this->visiting_team;
    }

    /**
     * Set practice
     *
     * @param boolean $practice
     * @return Schedule
     */
    public function setPractice($practice)
    {
        $this->practice = $practice;

        return $this;
    }

    /**
     * Get practice
     *
     * @return boolean 
     */
    public function getPractice()
    {
        return $this->practice;
    }
}
