<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rubrique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RubriqueRepository")
 */
class Rubrique
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


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
     * @return Rubrique
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
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Ajout products
     *
     * @param \AppBundle\Entity\Produit $produits
     * @return Produit
     */
    public function addProduct(\AppBundle\Entity\Produit $produits)
    {
        $this->produits[] = $produits;

        return $this;
    }

    /**
     * Supp produits
     *
     * @param \AppBundle\Entity\Produit $produits
     */
    public function suppProduit(\AppBundle\Entity\Produit $produits)
    {
        $this->produits->removeElement($produits);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
