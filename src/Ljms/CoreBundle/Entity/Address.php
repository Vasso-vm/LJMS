<?php
	namespace Ljms\CoreBundle\Entity;
	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
	 * @ORM\Entity
	 * @ORM\Table(name="Address")
     * @ORM\Entity(repositoryClass="Ljms\CoreBundle\Repository\AddressRepository")     
	*/
    class Address
    {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
	protected $id;

	/**
     * @ORM\Column(type="string" , length=100)
     */
    protected $address;

    /**
     * @ORM\Column(type="string" , length=100)
     */
    protected $city;
    /**
     * @ORM\Column(type="string" , length=10)
     */
    protected $zip;
    /**
     * @ORM\ManyToOne(targetEntity="State")
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
     * Set address
     *
     * @param string $address
     * @return Address
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
     * @return Address
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
     * Set zip
     *
     * @param string $zip
     * @return Address
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
     * Set state
     *
     * @param \Ljms\CoreBundle\Entity\State $state
     * @return Address
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->state = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add state
     *
     * @param \Ljms\CoreBundle\Entity\State $state
     * @return Address
     */
    public function addState(\Ljms\CoreBundle\Entity\State $state)
    {
        $this->state[] = $state;

        return $this;
    }

    /**
     * Remove state
     *
     * @param \Ljms\CoreBundle\Entity\State $state
     */
    public function removeState(\Ljms\CoreBundle\Entity\State $state)
    {
        $this->state->removeElement($state);
    }


}
