<?php
	namespace Ljms\CoreBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 *@ORM\Entity
	 *@ORM\Table(name="PlayerXteam")
	*/
	class PlayerXteam
	{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;
    /**
     * @ORM\OneToOne(targetEntity="Ljms\CoreBundle\Entity\Player",cascade={"persist"})
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    protected $player;
    /**
     * @ORM\ManyToOne(targetEntity="Ljms\CoreBundle\Entity\Team")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;
	


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
     * Set player
     *
     * @param \Ljms\CoreBundle\Entity\Player $player
     * @return PlayerXteam
     */
    public function setPlayer(\Ljms\CoreBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Ljms\CoreBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set team
     *
     * @param \Ljms\CoreBundle\Entity\Team $team
     * @return PlayerXteam
     */
    public function setTeam(\Ljms\CoreBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Ljms\CoreBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }
}
