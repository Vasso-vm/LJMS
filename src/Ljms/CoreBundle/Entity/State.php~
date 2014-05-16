<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;


	/**
	 * @ORM\Entity
	 * @ORM\Table(name="State")
	 */
	class State
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
     * @return State
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
}
