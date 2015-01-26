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
    * @Route(
    *      "/admin/produit/supprimer/{id}",
    *      name="supp_produit"
     * )
     * 
    */
     public function suppAction($id, Request $request) {          
        
        $doctrine = $this->getDoctrine();
        $rc = $doctrine->getRepository('AppBundle:Produit');
        $em = $doctrine->getManager();
        
        $entity = $rc->find($id);
        
        $em->remove($entity);
        $em->flush();
        
        $message = 'Le produit a été supprimé.';
        $request->getSession()->getFlashBag()->set('notice', $message);
        
        $url = $this->generateUrl('produit');
        
        return $this->redirect($url);
        
    }
    
    
    /**
    * @Route(
    *      "/admin/produit",
    *      name="produit"
     * )
     * 
    */
     public function indexAction() {          
        
        
        
        $produits = $this->getDoctrine()->getRepository('AppBundle:Produit')->findAll();
        
        $params =  array(
           'produits' => $produits
        );
        return $this->render('admin/produit/produit.html.twig', $params);
    }
    
    
    /**
    * 
    * @Route(
    *      "/admin/produit/ajout",
    *      name="ajout_produit", defaults = { "id" = null }
    * )
    * @Route(
    *      "/admin/produit/maj/{id}",
    *      name="maj_produit"
    * )
    * 
    * 
    */
    public function formAction(Request $request, $id) {          
        
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $rc = $doctrine->getRepository('AppBundle:Produit');
        
        if(!$id) {
            $entity = new Produit();
            $message = 'Le produit a été ajouté.';
        }else {
            $entity = $rc->find($id);
            $message = 'Le produit a été mis à jour.';
            
        }
        
        $type = new ProduitType();
        
        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $em->persist($data);
            $em->flush();
            
            $request->getSession()->getFlashBag()->set('notice', $message);
        
            return $this->redirect($this->generateUrl('produit'));
        }
        
        $params =  array(
            'produitForm' =>$form->createView()
        );
        return $this->render('admin/produit/ajout_produit.html.twig', $params);
    }
}
