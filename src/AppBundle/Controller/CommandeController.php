<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandeController extends Controller
{
    /**
     * @Route("/commande", name="commande")
     */
    public function commandeAction()
    {
        return $this->render('commande/commande.html.twig');
    }
    
    
}
