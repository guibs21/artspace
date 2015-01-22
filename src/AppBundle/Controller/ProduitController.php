<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;


use AppBundle\Entity\Produit; // notre entité
use AppBundle\Form\ProduitType; // notre form


class ProduitController extends Controller
{
    /**
     * @Route("/pricing", name="pricing")
     */
    public function indexAction()
    {
        return $this->render('default/pricing.html.twig');
    }
    
    /**
     * @Route("/admin/addproduct", name="addProduct")
     */
    public function addProductAction(Request $request)
    {
        
        //ajouter en bdd une nouvelle idée à chaque chargement 
        
        // creer une instance de notre entité
        $product = new Produit();
        
        // creer le formulaire
        $productForm = $this->createForm( new ProduitType(), $product);
        
        // injecte les donnees soumises dans notre instance de idea
        $productForm->handleRequest($request);
        
        // si le formulaire est soumis ET valide
        if ($productForm->isValid()) {
        
            // sauvagerde l'entité
            // recupere l'entity manager
            $em = $this->getDoctrine()->getManager();
            
            // demande à doctrine de sauvegarder notre instance
            $em->persist($product);
            
            // execute les requetes
            $em->flush();
            
            $this->addFlash("success", "Votre produit a bien été enregistrer !!!");
            
            // redirige l'utilisateur vers la liste de derrieres
            /*return $this->redirect( $this->generateUrl('showAllProduct'));*/
        
    }
        
        
        // shoot le formulaire à la vue 
        // attention à ne pas oublier ->createView()
        $params = array(
            "productForm" => $productForm->createView()
        );
        
        return $this->render('product/add_product.html.twig', $params);
    }
}
