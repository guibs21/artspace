<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CommandRepository")
 */
class Command
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255)
     */
    private $details;
    
        
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="commands")
     * @ORM\JoinTable(name="user_commands")
     */
    private $user;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCommand", type="datetime")
     */
    private $dateCommand;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal")
     */
    private $total;


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
     * Set details
     *
     * @param string $details
     * @return command
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return command
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set dateCommand
     *
     * @param \DateTime $dateCommand
     * @return Command
     */
    public function setDateCommand($dateCommand)
    {
        $this->dateCommand = $dateCommand;

        return $this;
    }

    /**
     * Get dateCommand
     *
     * @return \DateTime 
     */
    public function getDateCommand()
    {
        return $this->dateCommand;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

      /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Command
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
