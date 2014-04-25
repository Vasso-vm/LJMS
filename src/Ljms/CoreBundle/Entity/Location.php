<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 *@ORM\Entity
	 *@ORM\Table(name="Location")
     *@ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\LocationRepository")
	 */
	class Location
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
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
	protected $address;
	
	/**
     * @ORM\Column(type="string" , length=100 , nullable=true)
     */
	protected $city;

	/**
     * @ORM\Column(type="string" , length=20 , nullable=true)
     */
	protected $phone;

	/**
     * @ORM\Column(type="string" , length=10 , nullable=true)
     */
	protected $zip;

	/**
     * @ORM\Column(type="text" , nullable=true)
     */
	protected $url;

	/**
     * @ORM\Column(type="text" , nullable=true)
     */
	protected $google_map_link;

	/**
     * @ORM\Column(type="boolean" , options={"default" = 1})
     */
	protected $is_active;

    /**
     * @ORM\OneToOne(targetEntity="State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    protected $state;





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
     * @return Location
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
     * Set address
     *
     * @param string $address
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Location
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Location
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Location
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set google_map_link
     *
     * @param string $googleMapLink
     * @return Location
     */
    public function setGoogleMapLink($googleMapLink)
    {
        $this->google_map_link = $googleMapLink;

        return $this;
    }

    /**
     * Get google_map_link
     *
     * @return string 
     */
    public function getGoogleMapLink()
    {
        return $this->google_map_link;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Location
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
     * Set state
     *
     * @param \Ljms\CoreBundle\Entity\State $state
     * @return Location
     */
    public function setState(\Ljms\CoreBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \Ljms\CoreBundle\Entity\State 
     */
    public function getState()
    {
        return $this->state;
    }
}
