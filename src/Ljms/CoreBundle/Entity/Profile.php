<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Security\Core\User\UserInterface;
    use Doctrine\Common\Collections\ArrayCollection;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="Profile")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\ProfileRepository")
	*/
	class Profile implements UserInterface, \Serializable
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
	private $id;

	/**
    	* @ORM\Column(type="string", length=100)
    */
    protected $first_name;

    /**
    	* @ORM\Column(type="string", length=100)
    */
    protected $last_name;
    /**
      * @ORM\Column(type="string", length=100 , unique=true)
      */
    protected $email;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string salt
     */
    protected $salt;

    /**
        * @ORM\Column(type="string", length=255)
    */
    protected $password;
    /**
        * @ORM\Column(type="string", length=32 , nullable=true)
    */
    protected $verification;
    /**
        * @ORM\Column(type="string", length=20)
    */
    protected $home_phone;
    /**
     * @ORM\Column(type="string", length=20 , nullable=true)
     */
    protected $cell_phone;
    /**
     * @ORM\Column(type="decimal", length=10 , nullable=true)
    */
    protected $alt_phone;
    /**
     * @ORM\Column(type="boolean" , options={"default" = 1})
    */
    protected $is_active=1;
    /**
        * @ORM\Column(type="boolean" , options={"default" = 0})
    */
    protected $admin_role=0;
    /**
        * @ORM\Column(type="boolean" , options={"default" = 0})
    */
    protected $director_role=0;
    /**
        * @ORM\Column(type="boolean" , options={"default" = 0})
    */
    protected $guardian_role=0;
    /**
        * @ORM\Column(type="boolean" , options={"default" = 0})
    */
    protected $manager_role=0;
    /**
        * @ORM\Column(type="boolean" , options={"default" = 0})
    */
    protected $coach_role=0;

        /**
         * @ORM\OneToOne(targetEntity="Address",cascade={"persist"})
         * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
         */
    protected $address;

    /**
     * @ORM\OneToOne(targetEntity="AltContact",cascade={"persist"})
     * @ORM\JoinColumn(name="alt_contact_id", referencedColumnName="id")
     */
    protected $alt_contact;
    
    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="profile")
     */
    protected $players;

    /**
     * @ORM\OneToMany(targetEntity="Division", mappedBy="profile")
     */
    protected $divisions;

    /**
     * @ORM\OneToMany(targetEntity="Team", mappedBy="coach_profile")
     */
    protected $coach_teams;

    /**
     * @ORM\OneToMany(targetEntity="Team", mappedBy="manager_profile")
     */
    protected $manager_teams;

    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
        $this->players = new ArrayCollection();
        $this->divisions = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    /**
     * Set username
     *
     * @param string $value The username.
     */
    public function setUsername($value)
    {
        $this->email = $value;
    }
    /**
     *
     * @return string The username.
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Геттер для пароля.
     *
     * @return string The password.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Сеттер для пароля.
     *
     * @param string $value The password.
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     * Геттер для соли к паролю.
     *
     * @return string The salt.
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Сеттер для соли к паролю.
     *
     * @param string $value The salt.
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        if ($this->admin_role==1){
            return array('ROLE_ADMIN');
        }else if ($this->director_role==1){
            return array('ROLE_DIRECTOR');
        }        
    }

    public function serialize()
    {
        $ar=serialize(array(
            $this->id,
        ));
        return $ar;
    }

     public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }
    public function eraseCredentials()
    {

    }
    /**
     * Сравнивает пользователя с другим пользователем и определяет
     * один и тот же ли это человек.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
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
     * Set first_name
     *
     * @param string $firstName
     * @return Profile
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
     * @return Profile
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
     * Set email
     *
     * @param string $email
     * @return Profile
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set verification
     *
     * @param string $verification
     * @return Profile
     */
    public function setVerification($verification)
    {
        $this->verification = $verification;

        return $this;
    }

    /**
     * Get verification
     *
     * @return string 
     */
    public function getVerification()
    {
        return $this->verification;
    }

    /**
     * Set home_phone
     *
     * @param string $homePhone
     * @return Profile
     */
    public function setHomePhone($homePhone)
    {
        $this->home_phone = $homePhone;

        return $this;
    }

    /**
     * Get home_phone
     *
     * @return string 
     */
    public function getHomePhone()
    {
        return $this->home_phone;
    }

    /**
     * Set cell_phone
     *
     * @param string $cellPhone
     * @return Profile
     */
    public function setCellPhone($cellPhone)
    {
        $this->cell_phone = $cellPhone;

        return $this;
    }

    /**
     * Get cell_phone
     *
     * @return string 
     */
    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    /**
     * Set alt_phone
     *
     * @param string $altPhone
     * @return Profile
     */
    public function setAltPhone($altPhone)
    {
        $this->alt_phone = $altPhone;

        return $this;
    }

    /**
     * Get alt_phone
     *
     * @return string 
     */
    public function getAltPhone()
    {
        return $this->alt_phone;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Profile
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
     * Set admin_role
     *
     * @param boolean $adminRole
     * @return Profile
     */
    public function setAdminRole($adminRole)
    {
        $this->admin_role = $adminRole;

        return $this;
    }

    /**
     * Get admin_role
     *
     * @return boolean 
     */
    public function getAdminRole()
    {
        return $this->admin_role;
    }

    /**
     * Set director_role
     *
     * @param boolean $directorRole
     * @return Profile
     */
    public function setDirectorRole($directorRole)
    {
        $this->director_role = $directorRole;

        return $this;
    }

    /**
     * Get director_role
     *
     * @return boolean 
     */
    public function getDirectorRole()
    {
        return $this->director_role;
    }

    /**
     * Set guardian_role
     *
     * @param boolean $guardianRole
     * @return Profile
     */
    public function setGuardianRole($guardianRole)
    {
        $this->guardian_role = $guardianRole;

        return $this;
    }

    /**
     * Get guardian_role
     *
     * @return boolean 
     */
    public function getGuardianRole()
    {
        return $this->guardian_role;
    }

    /**
     * Set manager_role
     *
     * @param boolean $managerRole
     * @return Profile
     */
    public function setManagerRole($managerRole)
    {
        $this->manager_role = $managerRole;

        return $this;
    }

    /**
     * Get manager_role
     *
     * @return boolean 
     */
    public function getManagerRole()
    {
        return $this->manager_role;
    }

    /**
     * Set coach_role
     *
     * @param boolean $coachRole
     * @return Profile
     */
    public function setCoachRole($coachRole)
    {
        $this->coach_role = $coachRole;

        return $this;
    }

    /**
     * Get coach_role
     *
     * @return boolean 
     */
    public function getCoachRole()
    {
        return $this->coach_role;
    }

    /**
     * Set alt_contact
     *
     * @param \Ljms\CoreBundle\Entity\AltContact $altContact
     * @return Profile
     */
    public function setAltContact(\Ljms\CoreBundle\Entity\AltContact $altContact = null)
    {
        $this->alt_contact = $altContact;

        return $this;
    }

    /**
     * Get alt_contact
     *
     * @return \Ljms\CoreBundle\Entity\AltContact 
     */
    public function getAltContact()
    {
        return $this->alt_contact;
    }

    /**
     * Add players
     *
     * @param \Ljms\CoreBundle\Entity\Player $players
     * @return Profile
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

    /**
     * Add divisions
     *
     * @param \Ljms\CoreBundle\Entity\Division $divisions
     * @return Profile
     */
    public function addDivision(\Ljms\CoreBundle\Entity\Division $divisions)
    {
        $this->divisions[] = $divisions;

        return $this;
    }

    /**
     * Remove divisions
     *
     * @param \Ljms\CoreBundle\Entity\Division $divisions
     */
    public function removeDivision(\Ljms\CoreBundle\Entity\Division $divisions)
    {
        $this->divisions->removeElement($divisions);
    }

    /**
     * Get divisions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDivisions()
    {
        return $this->divisions;
    }

    /**
     * Add coach_teams
     *
     * @param \Ljms\CoreBundle\Entity\Team $coachTeams
     * @return Profile
     */
    public function addCoachTeam(\Ljms\CoreBundle\Entity\Team $coachTeams)
    {
        $this->coach_teams[] = $coachTeams;

        return $this;
    }

    /**
     * Remove coach_teams
     *
     * @param \Ljms\CoreBundle\Entity\Team $coachTeams
     */
    public function removeCoachTeam(\Ljms\CoreBundle\Entity\Team $coachTeams)
    {
        $this->coach_teams->removeElement($coachTeams);
    }

    /**
     * Get coach_teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoachTeams()
    {
        return $this->coach_teams;
    }

    /**
     * Add manager_teams
     *
     * @param \Ljms\CoreBundle\Entity\Team $managerTeams
     * @return Profile
     */
    public function addManagerTeam(\Ljms\CoreBundle\Entity\Team $managerTeams)
    {
        $this->manager_teams[] = $managerTeams;

        return $this;
    }

    /**
     * Remove manager_teams
     *
     * @param \Ljms\CoreBundle\Entity\Team $managerTeams
     */
    public function removeManagerTeam(\Ljms\CoreBundle\Entity\Team $managerTeams)
    {
        $this->manager_teams->removeElement($managerTeams);
    }

    /**
     * Get manager_teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getManagerTeams()
    {
        return $this->manager_teams;
    }



    /**
     * Set address
     *
     * @param \Ljms\CoreBundle\Entity\Address $address
     * @return Profile
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
}
