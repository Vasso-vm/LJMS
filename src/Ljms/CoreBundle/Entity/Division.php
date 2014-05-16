<?php
	namespace Ljms\CoreBundle\Entity;
    use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\HttpFoundation\File\UploadedFile;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="Division")
     * @ORM\HasLifecycleCallbacks
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\DivisionRepository")
     * @UniqueEntity(
     *      fields = "name",
     *      message = "This Division name is already used."
     * )
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
     * @Assert\NotBlank(message="Field Division name is required.")
     * @Assert\Length(
     *     max = "100"
     * )
     */
	protected $name;

	/**
     * @ORM\Column(type="string" , length=2)
     * @Assert\NotBlank(message="Field min age is required.")
     * @Assert\Length(
     *     max = "2"
     * )
     */
    protected $min_age;

    /**
     * @ORM\Column(type="string" , length=2)
     * @Assert\NotBlank(message="Field max age is required.")
     * @Assert\Length(
     *     max = "2"
     * )
     */
    protected $max_age;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank(message="Field is Active is required.")
     */
	protected $is_active;

	/**
     * @ORM\Column(type="text" , nullable=true)
     * @Assert\Length(
     *     max = "500"
     * )
     */
	protected $description;
	
	/**
     * @ORM\Column(type="text" , nullable=true)
     * @Assert\Length(
     *     max = "500"
     * )
     */
	protected $rules;
	
	/**
     * @ORM\Column(type="string" , nullable=true)
     */
	protected $photo;

    /**
     * @Assert\File(
     *     maxSize = "4M"
     * )
     * @Assert\Image(
     *     maxWidth = "640",
     *     maxHeight = "480"
     * )
     */
    protected $file;

    private $temp;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Profile", inversedBy="divisions")
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
    public function getAbsolutePath()
    {
        return null === $this->photo
            ? null
            : $this->getUploadRootDir().'/'.$this->photo;
    }
    public function getWebPath()
    {
        return null === $this->photo
            ? null
            : '/web/'.$this->getUploadDir().'/'.$this->photo;
    }
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'bundles/ljmshome/avatars';
    }
    /**
     * Set file
     *
     * @param UploadedFile $file
     *
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        if (isset($this->photo)) {
            // store the old name to delete after the update
            $this->temp = $this->photo;
            $this->photo = null;
        } else {
            $this->photo = 'initial';
        }
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->photo = $filename.'.'.$this->getFile()->guessExtension();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->photo);
        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }
    /**
     * Get file
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
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
}
