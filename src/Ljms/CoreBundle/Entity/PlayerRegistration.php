<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="PlayerRegistration")
     * @UniqueEntity(
     *      fields = "jersey_name",
     *      message = "This Jersey name is already used."
     * )
     * @UniqueEntity(
     *      fields = "jersey_number",
     *      message = "This Jersey number is already used."
     * )
	*/
	class PlayerRegistration
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

    /**
     * @ORM\Column(type="string" , length=30)
     * @Assert\NotBlank(message="Field Jersey name is required.")
     * @Assert\Length(
     *      min = "2",
     *      max = "30"
     * )
     */
    protected $jersey_name;

    /**
     * @ORM\Column(type="string" , length=3 , unique=true)
     * @Assert\NotBlank(message="Field Jersey number is required.")
     * @Assert\Length(
     *      max = "3"
     * )
     */
    protected $jersey_number;

    /**
     * @ORM\ManyToOne(targetEntity="TypeUniformGroup")
     * @ORM\JoinColumn(name="shirt_type_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Field Shirt type is required.")
     */
    protected $shirt_type;

    /**
     * @ORM\ManyToOne(targetEntity="TypeUniformGroup")
     * @ORM\JoinColumn(name="short_type_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Field Short type is required.")
     */
    protected $short_type;

    /**
     * @ORM\ManyToOne(targetEntity="TypeUniformSize")
     * @ORM\JoinColumn(name="shirt_size_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Field Shirt size is required.")
     */
	protected $shirt_size;

    /**
     * @ORM\ManyToOne(targetEntity="TypeUniformSize")
     * @ORM\JoinColumn(name="short_size_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Field Short size is required.")
     */
	protected $short_size;

    
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
     * Set jersey_name
     *
     * @param string $jerseyName
     * @return PlayerRegistration
     */
    public function setJerseyName($jerseyName)
    {
        $this->jersey_name = $jerseyName;

        return $this;
    }

    /**
     * Get jersey_name
     *
     * @return string 
     */
    public function getJerseyName()
    {
        return $this->jersey_name;
    }

    /**
     * Set jersey_number
     *
     * @param string $jerseyNumber
     * @return PlayerRegistration
     */
    public function setJerseyNumber($jerseyNumber)
    {
        $this->jersey_number = $jerseyNumber;

        return $this;
    }

    /**
     * Get jersey_number
     *
     * @return string 
     */
    public function getJerseyNumber()
    {
        return $this->jersey_number;
    }

    /**
     * Set shirt_type
     *
     * @param \Ljms\CoreBundle\Entity\TypeUniformGroup $shirtType
     * @return PlayerRegistration
     */
    public function setShirtType(\Ljms\CoreBundle\Entity\TypeUniformGroup $shirtType = null)
    {
        $this->shirt_type = $shirtType;

        return $this;
    }

    /**
     * Get shirt_type
     *
     * @return \Ljms\CoreBundle\Entity\TypeUniformGroup 
     */
    public function getShirtType()
    {
        return $this->shirt_type;
    }

    /**
     * Set short_type
     *
     * @param \Ljms\CoreBundle\Entity\TypeUniformGroup $shortType
     * @return PlayerRegistration
     */
    public function setShortType(\Ljms\CoreBundle\Entity\TypeUniformGroup $shortType = null)
    {
        $this->short_type = $shortType;

        return $this;
    }

    /**
     * Get short_type
     *
     * @return \Ljms\CoreBundle\Entity\TypeUniformGroup 
     */
    public function getShortType()
    {
        return $this->short_type;
    }

    /**
     * Set shirt_size
     *
     * @param \Ljms\CoreBundle\Entity\TypeUniformSize $shirtSize
     * @return PlayerRegistration
     */
    public function setShirtSize(\Ljms\CoreBundle\Entity\TypeUniformSize $shirtSize = null)
    {
        $this->shirt_size = $shirtSize;

        return $this;
    }

    /**
     * Get shirt_size
     *
     * @return \Ljms\CoreBundle\Entity\TypeUniformSize 
     */
    public function getShirtSize()
    {
        return $this->shirt_size;
    }

    /**
     * Set short_size
     *
     * @param \Ljms\CoreBundle\Entity\TypeUniformSize $shortSize
     * @return PlayerRegistration
     */
    public function setShortSize(\Ljms\CoreBundle\Entity\TypeUniformSize $shortSize = null)
    {
        $this->short_size = $shortSize;

        return $this;
    }

    /**
     * Get short_size
     *
     * @return \Ljms\CoreBundle\Entity\TypeUniformSize 
     */
    public function getShortSize()
    {
        return $this->short_size;
    }
}
