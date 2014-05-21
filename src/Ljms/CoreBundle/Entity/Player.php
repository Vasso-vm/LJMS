<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="Player")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\PlayerRepository")
     * @Assert\GroupSequence({"Player"})
	 */
	class Player
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	/**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Field First Name is required.")
     * @Assert\Length(
     *      min = "2",
     *      max = "100"
     * )
     */
	protected $first_name;

	/**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Field Last Name is required.")
     * @Assert\Length(
     *      min = "2",
     *      max = "100"
     * )
     */
	protected $last_name;

	/**
     * @ORM\Column(type="boolean" , options={"default" = 0})
     *
     */
	protected $shares_guardian_address;

	/**
     * @ORM\Column(type="datetime")
     * @Assert\Date()
     */
	protected $birth_date;
	
	/**
     * @ORM\Column(type="boolean" , options={"default" = 1})
     */
	protected $is_active=1;
    
    /**
     * @ORM\Column(type="text" , nullable=true)
     * @Assert\Length(
     *     max = "500"
     * )
     */
    protected $note;

    /**
     * @ORM\ManyToOne(targetEntity="Address",cascade={"persist"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $address;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile", inversedBy="players")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile;
    /**
     * @ORM\OneToOne(targetEntity="PlayerRegistration",cascade={"persist"})
     * @ORM\JoinColumn(name="player_registration_id", referencedColumnName="id")
     */
	protected $player_registration;
    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="players")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;
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
     * Set first_name
     *
     * @param string $firstName
     * @return Player
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Player
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set shares_guardian_address
     *
     * @param integer $sharesGuardianAddress
     * @return Player
     */
    public function setSharesGuardianAddress($sharesGuardianAddress)
    {
        $this->shares_guardian_address = $sharesGuardianAddress;

        return $this;
    }

    /**
     * Get shares_guardian_address
     *
     * @return integer 
     */
    public function getSharesGuardianAddress()
    {
        return $this->shares_guardian_address;
    }

    /**
     * Set birth_date
     *
     * @param \DateTime $birthDate
     * @return Player
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birth_date
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Player
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
     * Set address
     *
     * @param \Ljms\CoreBundle\Entity\Address $address
     * @return Player
     */
    public function setAddress(\Ljms\CoreBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Ljms\CoreBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set profile
     *
     * @param \Ljms\CoreBundle\Entity\Profile $profile
     * @return Player
     */
    public function setProfile(\Ljms\CoreBundle\Entity\Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Ljms\CoreBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Player
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set player_registration
     *
     * @param \Ljms\CoreBundle\Entity\PlayerRegistration $playerRegistration
     * @return Player
     */
    public function setPlayerRegistration(\Ljms\CoreBundle\Entity\PlayerRegistration $playerRegistration = null)
    {
        $this->player_registration = $playerRegistration;

        return $this;
    }

    /**
     * Get player_registration
     *
     * @return \Ljms\CoreBundle\Entity\PlayerRegistration 
     */
    public function getPlayerRegistration()
    {
        return $this->player_registration;
    }

    /**
     * Set team
     *
     * @param \Ljms\CoreBundle\Entity\Team $team
     * @return Player
     */
    public function setTeam(\Ljms\CoreBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Ljms\CoreBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }
}
