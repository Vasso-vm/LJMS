<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Security\Core\User\AdvancedUserInterface;
    use Symfony\Component\Security\Core\User\UserInterface;
    use Doctrine\Common\Collections\ArrayCollection;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
    use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="Profile")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\ProfileRepository")
     * @Assert\GroupSequence({"Profile", "Add"})
     * @UniqueEntity(
     *      fields = "email",
     *      message = "This email is already used."
     * )
	 */
	class Profile implements AdvancedUserInterface, \Serializable
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
	private $id;

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
     * @ORM\Column(type="string", length=100 , unique=true)
     * @Assert\Email()
     * @Assert\NotBlank(message="Field Email is required.")
     * @Assert\Length(
     *      max = "100"
     * )
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string salt
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Field Password is required." , groups={"Add"})
     * @Assert\Length(
     *      min = "5",
     *      max = "30"
     * )
     */
    protected $password;

    /**
        * @ORM\Column(type="string", length=32 , nullable=true)
    */
    protected $verification;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Field Home Phone is required.")
     * @Assert\Length(
     *      max = "20"
     * )
     */
    protected $home_phone;

    /**
     * @ORM\Column(type="string", length=20 , nullable=true)
     * @Assert\Length(
     *      max = "20"
     * )
     */
    protected $cell_phone;

    /**
     * @ORM\Column(type="decimal", length=10 , nullable=true)
     * @Assert\Length(
     *      max = "20"
     * )
     */
    protected $alt_phone;

    /**
     * @ORM\Column(type="boolean" , options={"default" = 1})
     */
    protected $is_active=1;

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

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     *
     */
    private $roles;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
        $this->players = new ArrayCollection();
        $this->divisions = new ArrayCollection();
        $this->teams = new ArrayCollection();
        $this->roles = new ArrayCollection();
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
        public function isAccountNonExpired()
        {
            return true;
        }

        public function isAccountNonLocked()
        {
            return true;
        }

        public function isCredentialsNonExpired()
        {
            return true;
        }

        public function isEnabled()
        {
            return true;
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
        return $this->roles->toArray();
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

    /**
     * Generate random password
     * @param int $length
     * @return string
     */
    public function GeneratePassword($length){
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++){
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
    }

    /**
     * Generate random token
     * @return bool
     */
    public function generateToken(){
    $token=md5($this->GeneratePassword(6));
    $this->setVerification($token);
    return true;
    }

    /**
     * Save new password to db
     * @return string
     */
    public function confirmPassword(){
    $pass=$this->GeneratePassword(6);
    $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
    $password = $encoder->encodePassword($pass, $this->getSalt());
    $this->setPassword($password);
    $this->setVerification(null);
    return $pass;
    }

    /**
     * Add roles
     *
     * @param \Ljms\CoreBundle\Entity\Role $roles
     * @return Profile
     */
    public function addRole(\Ljms\CoreBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Ljms\CoreBundle\Entity\Role $roles
     */
    public function removeRole(\Ljms\CoreBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }
}
