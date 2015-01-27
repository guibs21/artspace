<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("/pricing", name="pricing")
     */
    public function pricingAction()
    {
        $doctrine = $this->getDoctrine();
        $rc = $doctrine->getRepository('AppBundle:Produit');
        
        $produits = $rc->findAll();
        
        $params = array(
           'produits' => $produits
        );
        
        return $this->render('pricing/pricing.html.twig', $params);
    }
    
    /**
     * @Route("/pricing/{id}", name="pricingDetail") 
     */
    public function pricingDetailsAction($id){
        //récupère le film depuis la bdd, en fonction de son id (présent dans l'URL)
        $produitRepo = $this->getDoctrine()->getRepository("AppBundle:Produit");
        $produit = $produitRepo->find($id);

        $params = array(
            'produit' => $produit
        );

        //envoie la vue, en lui passant les variables
        return $this->render('pricing/pricing_detail.html.twig', $params);    
    }
}
