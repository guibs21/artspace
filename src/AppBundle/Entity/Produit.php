<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProduitRepository")
 */
class Produit
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
     * @Assert\NotBlank(message="vous n'avez pas saisie de nom.")
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="vous n'avez pas saisie de prix.")
     * @ORM\Column(name="prix", type="decimal", precision=3, scale=0)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="option1", type="string", length=255, nullable=true)
     */
    private $option1;

    /**
     * @var string
     *
     * @ORM\Column(name="option1Detail", type="string", length=255, nullable=true)
     */
    private $option1Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option2", type="string", length=255, nullable=true)
     */
    private $option2;

    /**
     * @var string
     *
     * @ORM\Column(name="option2Detail", type="string", length=255, nullable=true)
     */
    private $option2Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option3", type="string", length=255, nullable=true)
     */
    private $option3;

    /**
     * @var string
     *
     * @ORM\Column(name="option3Detail", type="string", length=255, nullable=true)
     */
    private $option3Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option4", type="string", length=255, nullable=true)
     */
    private $option4;

    /**
     * @var string
     *
     * @ORM\Column(name="option4Detail", type="string", length=255, nullable=true)
     */
    private $option4Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option5", type="string", length=255, nullable=true)
     */
    private $option5;

    /**
     * @var string
     *
     * @ORM\Column(name="option5Detail", type="string", length=255, nullable=true)
     */
    private $option5Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option6", type="string", length=255, nullable=true)
     */
    private $option6;

    /**
     * @var string
     *
     * @ORM\Column(name="option6Detail", type="string", length=255, nullable=true)
     */
    private $option6Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option7", type="string", length=255, nullable=true)
     */
    private $option7;

    /**
     * @var string
     *
     * @ORM\Column(name="option7Detail", type="string", length=255, nullable=true)
     */
    private $option7Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option8", type="string", length=255, nullable=true)
     */
    private $option8;

    /**
     * @var string
     *
     * @ORM\Column(name="option8Detail", type="string", length=255, nullable=true)
     */
    private $option8Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option9", type="string", length=255, nullable=true)
     */
    private $option9;

    /**
     * @var string
     *
     * @ORM\Column(name="option9Detail", type="string", length=255, nullable=true)
     */
    private $option9Detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option10", type="string", length=255, nullable=true)
     */
    private $option10;

    /**
     * @var string
     *
     * @ORM\Column(name="option10Detail", type="string", length=255, nullable=true)
     */
    private $option10Detail;
    
    /**
    * @ORM\ManyToOne(targetEntity="Rubrique", inversedBy="produits")
    * @ORM\JoinColumn(name="rubrique_id", referencedColumnName="id")
    */
    protected $rubrique;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="produits")
     * @ORM\JoinTable(name="user_produit")
     */
    private $users;
    

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
     * Set nom
     *
     * @param string $nom
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set option1
     *
     * @param string $option1
     * @return Produit
     */
    public function setOption1($option1)
    {
        $this->option1 = $option1;

        return $this;
    }

    /**
     * Get option1
     *
     * @return string 
     */
    public function getOption1()
    {
        return $this->option1;
    }

    /**
     * Set option2
     *
     * @param string $option2
     * @return Produit
     */
    public function setOption2($option2)
    {
        $this->option2 = $option2;

        return $this;
    }

    /**
     * Get option2
     *
     * @return string 
     */
    public function getOption2()
    {
        return $this->option2;
    }

    /**
     * Set option3
     *
     * @param string $option3
     * @return Produit
     */
    public function setOption3($option3)
    {
        $this->option3 = $option3;

        return $this;
    }

    /**
     * Get option3
     *
     * @return string 
     */
    public function getOption3()
    {
        return $this->option3;
    }

    /**
     * Set option4
     *
     * @param string $option4
     * @return Produit
     */
    public function setOption4($option4)
    {
        $this->option4 = $option4;

        return $this;
    }

    /**
     * Get option4
     *
     * @return string 
     */
    public function getOption4()
    {
        return $this->option4;
    }

    /**
     * Set option5
     *
     * @param string $option5
     * @return Produit
     */
    public function setOption5($option5)
    {
        $this->option5 = $option5;

        return $this;
    }

    /**
     * Get option5
     *
     * @return string 
     */
    public function getOption5()
    {
        return $this->option5;
    }

    /**
     * Set option6
     *
     * @param string $option6
     * @return Produit
     */
    public function setOption6($option6)
    {
        $this->option6 = $option6;

        return $this;
    }

    /**
     * Get option6
     *
     * @return string 
     */
    public function getOption6()
    {
        return $this->option6;
    }

    /**
     * Set option7
     *
     * @param string $option7
     * @return Produit
     */
    public function setOption7($option7)
    {
        $this->option7 = $option7;

        return $this;
    }

    /**
     * Get option7
     *
     * @return string 
     */
    public function getOption7()
    {
        return $this->option7;
    }

    /**
     * Set option8
     *
     * @param string $option8
     * @return Produit
     */
    public function setOption8($option8)
    {
        $this->option8 = $option8;

        return $this;
    }

    /**
     * Get option8
     *
     * @return string 
     */
    public function getOption8()
    {
        return $this->option8;
    }

    /**
     * Set option9
     *
     * @param string $option9
     * @return Produit
     */
    public function setOption9($option9)
    {
        $this->option9 = $option9;

        return $this;
    }

    /**
     * Get option9
     *
     * @return string 
     */
    public function getOption9()
    {
        return $this->option9;
    }

    /**
     * Set option10
     *
     * @param string $option10
     * @return Produit
     */
    public function setOption10($option10)
    {
        $this->option10 = $option10;

        return $this;
    }

    /**
     * Get option10
     *
     * @return string 
     */
    public function getOption10()
    {
        return $this->option10;
    }

    /**
     * Set rubrique
     *
     * @param \AppBundle\Entity\Rubrique $rubrique
     * @return Produit
     */
    public function setRubrique(\AppBundle\Entity\Rubrique $rubrique = null)
    {
        $this->rubrique = $rubrique;
        
        return $this;
    }

    /**
     * Get rubrique
     *
     * @return \AppBundle\Entity\Rubrique 
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \AppBundle\Entity\User $users
     * @return Produit
     */
    public function addUser(\AppBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \AppBundle\Entity\User $users
     */
    public function removeUser(\AppBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set option1Detail
     *
     * @param string $option1Detail
     * @return Produit
     */
    public function setOption1Detail($option1Detail)
    {
        $this->option1Detail = $option1Detail;

        return $this;
    }

    /**
     * Get option1Detail
     *
     * @return string 
     */
    public function getOption1Detail()
    {
        return $this->option1Detail;
    }

    /**
     * Set option2Detail
     *
     * @param string $option2Detail
     * @return Produit
     */
    public function setOption2Detail($option2Detail)
    {
        $this->option2Detail = $option2Detail;

        return $this;
    }

    /**
     * Get option2Detail
     *
     * @return string 
     */
    public function getOption2Detail()
    {
        return $this->option2Detail;
    }

    /**
     * Set option3Detail
     *
     * @param string $option3Detail
     * @return Produit
     */
    public function setOption3Detail($option3Detail)
    {
        $this->option3Detail = $option3Detail;

        return $this;
    }

    /**
     * Get option3Detail
     *
     * @return string 
     */
    public function getOption3Detail()
    {
        return $this->option3Detail;
    }

    /**
     * Set option4Detail
     *
     * @param string $option4Detail
     * @return Produit
     */
    public function setOption4Detail($option4Detail)
    {
        $this->option4Detail = $option4Detail;

        return $this;
    }

    /**
     * Get option4Detail
     *
     * @return string 
     */
    public function getOption4Detail()
    {
        return $this->option4Detail;
    }

    /**
     * Set option5Detail
     *
     * @param string $option5Detail
     * @return Produit
     */
    public function setOption5Detail($option5Detail)
    {
        $this->option5Detail = $option5Detail;

        return $this;
    }

    /**
     * Get option5Detail
     *
     * @return string 
     */
    public function getOption5Detail()
    {
        return $this->option5Detail;
    }

    /**
     * Set option6Detail
     *
     * @param string $option6Detail
     * @return Produit
     */
    public function setOption6Detail($option6Detail)
    {
        $this->option6Detail = $option6Detail;

        return $this;
    }

    /**
     * Get option6Detail
     *
     * @return string 
     */
    public function getOption6Detail()
    {
        return $this->option6Detail;
    }

    /**
     * Set option7Detail
     *
     * @param string $option7Detail
     * @return Produit
     */
    public function setOption7Detail($option7Detail)
    {
        $this->option7Detail = $option7Detail;

        return $this;
    }

    /**
     * Get option7Detail
     *
     * @return string 
     */
    public function getOption7Detail()
    {
        return $this->option7Detail;
    }

    /**
     * Set option8Detail
     *
     * @param string $option8Detail
     * @return Produit
     */
    public function setOption8Detail($option8Detail)
    {
        $this->option8Detail = $option8Detail;

        return $this;
    }

    /**
     * Get option8Detail
     *
     * @return string 
     */
    public function getOption8Detail()
    {
        return $this->option8Detail;
    }

    /**
     * Set option9Detail
     *
     * @param string $option9Detail
     * @return Produit
     */
    public function setOption9Detail($option9Detail)
    {
        $this->option9Detail = $option9Detail;

        return $this;
    }

    /**
     * Get option9Detail
     *
     * @return string 
     */
    public function getOption9Detail()
    {
        return $this->option9Detail;
    }

    /**
     * Set option10Detail
     *
     * @param string $option10Detail
     * @return Produit
     */
    public function setOption10Detail($option10Detail)
    {
        $this->option10Detail = $option10Detail;

        return $this;
    }

    /**
     * Get option10Detail
     *
     * @return string 
     */
    public function getOption10Detail()
    {
        return $this->option10Detail;
    }
}
