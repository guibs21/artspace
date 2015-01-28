<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PricingController extends Controller
{
    
    /**
     * @Route("/pricing", name="pricing")
     */
    public function listPricingAction()
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
     * @Route("/pricing/{produitId}", name="pricingDetail", requirements={"produitId":"\d+"}) 
     */
    public function pricingDetailsAction($produitId){
        //récupère le film depuis la bdd, en fonction de son id (présent dans l'URL)
        $produitRepo = $this->getDoctrine()->getRepository("AppBundle:Produit");
        $produit = $produitRepo->find($produitId);

        $params = array(
            'produit' => $produit
        );

        //envoie la vue, en lui passant les variables
        return $this->render('pricing/pricing_detail.html.twig', $params);    
    }
}
