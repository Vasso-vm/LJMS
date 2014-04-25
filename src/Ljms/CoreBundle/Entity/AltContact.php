<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 *@ORM\Entity
	 *@ORM\Table(name="altContact")
	*/
	class AltContact
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	/**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
	protected $altFirstName;

	/**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
	protected $altLastName;

	/**
     * @ORM\Column(type="string", length=20 , nullable=true)
     */
	protected $altPhone;

	/**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
	protected $altEmail;

	
	protected $profile;
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
     * Set altFirstName
     *
     * @param string $altFirstName
     * @return AltContact
     */
    public function setAltFirstName($altFirstName)
    {
        $this->altFirstName = $altFirstName;

        return $this;
    }

    /**
     * Get altFirstName
     *
     * @return string 
     */
    public function getAltFirstName()
    {
        return $this->altFirstName;
    }

    /**
     * Set altLastName
     *
     * @param string $altLastName
     * @return AltContact
     */
    public function setAltLastName($altLastName)
    {
        $this->altLastName = $altLastName;

        return $this;
    }

    /**
     * Get altLastName
     *
     * @return string 
     */
    public function getAltLastName()
    {
        return $this->altLastName;
    }

    /**
     * Set altPhone
     *
     * @param string $altPhone
     * @return AltContact
     */
    public function setAltPhone($altPhone)
    {
        $this->altPhone = $altPhone;

        return $this;
    }

    /**
     * Get altPhone
     *
     * @return string 
     */
    public function getAltPhone()
    {
        return $this->altPhone;
    }

    /**
     * Set altEmail
     *
     * @param string $altEmail
     * @return AltContact
     */
    public function setAltEmail($altEmail)
    {
        $this->altEmail = $altEmail;

        return $this;
    }

    /**
     * Get altEmail
     *
     * @return string 
     */
    public function getAltEmail()
    {
        return $this->altEmail;
    }

    /**
     * Set profile
     *
     * @param \Ljms\CoreBundle\Entity\Profile $profile
     * @return AltContact
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
}
