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
        
        return $this->render('default/pricing.html.twig', $params);
    }
}
