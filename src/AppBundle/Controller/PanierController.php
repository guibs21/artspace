<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class PanierController extends Controller
{
    /**
     * @Route("/panier/ajout/{produitId}", name="ajoutPanier", requirements={"produitId":"\d+"})
     */
    public function ajoutPanierAction($produitId)
    {
        //on récupère l'objet (l'instance) du user connecté
        $user = $this->getUser();

        //on récupère l'instance du produit à ajouter
        $produitRepo = $this->getDoctrine()->getRepository("AppBundle:Produit");
        $produit = $produitRepo->find( $produitId );

        //on ajoute le produit à l'user, et vice-versa
        $user->ajoutProduit($produit);
        $produit->addUser($user);

        //on sauvegarde nos objets (contenant les relations) en base
        $em = $this->getDoctrine()->getManager();
        $em->flush();

        //redirige vers la page détail, avec un message
        $this->addFlash("success", "Le produit a bien été ajouté !");
        return $this->redirect( $this->generateUrl("viewPanier") );
    }


    /**
     * @Route("/panier", name="viewPanier")
     */
    public function viewPanierAction(){
        $user = $this->getUser();
        $produits = $user->getProduits();
        
        $params = array(
            "produits" => $produits
        );
        return $this->render("panier/view.html.twig", $params);
    }
    
    /**
     * @Route("/panier/supprimer/{id}", name="suppPanier")
     */
    public function suppPanierAction($id) {
    
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('AppBundle:Produit')->find($id);
        
        $produit->removeUser($user);
        $em->flush();
        
        return $this->redirect($this->generateUrl('viewPanier'));
        
    }
}
