<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="altContact")
     * @UniqueEntity(
     *      fields = "alt_email",
     *      message = "This email is already used."
     * )
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
     * @Assert\Length(
     *      max = "100"
     * )
     */
	protected $alt_first_name;

	/**
     * @ORM\Column(type="string", length=100 , nullable=true)
     * @Assert\Length(
     *      max = "100"
     * )
     */
	protected $alt_last_name;

	/**
     * @ORM\Column(type="string", length=20 , nullable=true)
     * @Assert\Length(
     *      max = "20"
     * )
     */
	protected $alt_phone;

	/**
     * @ORM\Column(type="string", length=100 , nullable=true)
     * @Assert\Email()
     * @Assert\Length(
     *      max = "100"
     * )
     */
	protected $alt_email;


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
     * Set alt_first_name
     *
     * @param string $altFirstName
     * @return AltContact
     */
    public function setAltFirstName($altFirstName)
    {
        $this->alt_first_name = $altFirstName;

        return $this;
    }

    /**
     * Get alt_first_name
     *
     * @return string 
     */
    public function getAltFirstName()
    {
        return $this->alt_first_name;
    }

    /**
     * Set alt_last_name
     *
     * @param string $altLastName
     * @return AltContact
     */
    public function setAltLastName($altLastName)
    {
        $this->alt_last_name = $altLastName;

        return $this;
    }

    /**
     * Get alt_last_name
     *
     * @return string 
     */
    public function getAltLastName()
    {
        return $this->alt_last_name;
    }

    /**
     * Set alt_phone
     *
     * @param string $altPhone
     * @return AltContact
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
     * Set alt_email
     *
     * @param string $altEmail
     * @return AltContact
     */
    public function setAltEmail($altEmail)
    {
        $this->alt_email = $altEmail;

        return $this;
    }

    /**
     * Get alt_email
     *
     * @return string 
     */
    public function getAltEmail()
    {
        return $this->alt_email;
    }
}
