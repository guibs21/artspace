<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    /**
     * @Route("/pricing", name="pricing")
     */
    public function indexAction()
    {
        return $this->render('default/pricing.html.twig');
    }
}
