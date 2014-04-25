<?php
	namespace Ljms\CoreBundle\Entity;
    use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;

	/**
	 *@ORM\Entity
	 *@ORM\Table(name="Division")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\DivisionRepository")
	 */
	class Division{

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
     * @ORM\Column(type="string")
     */
    protected $min_age;

    /**
     * @ORM\Column(type="string")
     */
    protected $max_age;
    /**
     * @ORM\Column(type="string")
     */
	protected $is_active;

	/**
     * @ORM\Column(type="text",nullable=true)
     */
	protected $description;
	
	/**
     * @ORM\Column(type="text",nullable=true)
     */
	protected $rules;
	
	/**
     * @ORM\Column(type="string" , nullable=true)
     */
	protected $photo;
	
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile;

    /**
     * @ORM\OneToMany(targetEntity="Team" , mappedBy="division")
     */
    protected $teams;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Division
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Division
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Division
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Division
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set min_age
     *
     * @param boolean $minAge
     * @return Division
     */
    public function setMinAge($minAge)
    {
        $this->min_age = $minAge;

        return $this;
    }

    /**
     * Get min_age
     *
     * @return boolean 
     */
    public function getMinAge()
    {
        return $this->min_age;
    }

    /**
     * Set max_age
     *
     * @param string $maxAge
     * @return Division
     */
    public function setMaxAge($maxAge)
    {
        $this->max_age = $maxAge;

        return $this;
    }

    /**
     * Get max_age
     *
     * @return string 
     */
    public function getMaxAge()
    {
        return $this->max_age;
    }

    /**
     * Set rules
     *
     * @param string $rules
     * @return Division
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get rules
     *
     * @return string 
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Set profile
     *
     * @param \Ljms\CoreBundle\Entity\Profile $profile
     * @return Division
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
     * Add teams
     *
     * @param \Ljms\CoreBundle\Entity\Team $teams
     * @return Division
     */
    public function addTeam(\Ljms\CoreBundle\Entity\Team $teams)
    {
        $this->teams[] = $teams;

        return $this;
    }

    /**
     * Remove teams
     *
     * @param \Ljms\CoreBundle\Entity\Team $teams
     */
    public function removeTeam(\Ljms\CoreBundle\Entity\Team $teams)
    {
        $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }
}
