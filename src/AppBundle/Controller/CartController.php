<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Command;
use AppBundle\Entity\DetailsCommands;
    
   
                      
class CartController extends Controller{
    
    
       /**
        * @Route("/cart/addToCart", name="addToCart")
        * 
        * 
        */
    public function ajoutPanierAction(Request $request)
    {
        $productId = $request->query->get('productId');
        
        $productIdRepository = $this->getDoctrine()->getRepository("AppBundle:Products");
        $product = $productIdRepository->find($productId);
        
        $session = new Session();
        
        
        if ($session->has('panier'))
        {
            $panier = $session->get('panier');
            array_push($panier, $product);
        }
        else
        {
            $panier = Array('0'=>  $product);           
        }
        
        $session->set('panier', $panier);
        $session_id = $session->getId();

        $this->addFlash("success", "Un produit a été ajouté à votre panier !");
        
        
         return $this->redirect(
                     $this->generateUrl("viewCart")
                     );
         
    }
        
    
    /**
        * @Route("/cart/removeToCart", name="removeToCart")
        * 
        * 
        */
    public function suppPanierAction(Request $request)
    {
        $opn = $request->query->get('ordre_panier');
        $session = new Session();
        
        if ($session->has('panier'))
        {
            $panier = $session->get('panier');
            $tab1 = array_slice($panier, 0, $opn);
            $tab2 = array_slice($panier, ($opn+1));
            $panier = array_merge($tab1, $tab2);            
        }
        $session->set('panier', $panier);
        $session_id = $session->getId();
        
        $referer = $this->getRequest()->headers->get('referer');
        $this->addFlash("success", "Le produit a bien été retiré de votre panier !");
        return $this->redirect($referer); 
    }
    
     /**
        * @Route("/cart/validateCommand", name="validateCommand")
        * 
        * 
        */
    public function validateCommand()
    {
        $user = $this->getUser();
        
        
        $command = new Command();
        $command->setDetails('note');
        $command->setTotal(12);
        $command->setDateCommand(new \DateTime());
        $command->setUser($user);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($command);
        $em->flush();
        
        $session = new Session();
        $panier = $session->get('panier');
        $total=0;
        
        foreach ($panier as $product) {
            
            $detailsCommands = new detailsCommands();
            $detailsCommands->setPrice($product->getPrice());
            $detailsCommands->setReference($product->getName());
            $detailsCommands->setDateCreated(new \DateTime());
            $detailsCommands->setCommand($command);
            $total += $detailsCommands->getPrice(); 
            $em->persist($detailsCommands);
        }
        
        $command->setTotal($total);
        $em->flush();
        $panier = array();
        $session->set('panier', $panier);
        
        $this->addFlash("success", "Votre commande a bien été validée !");
        return $this->redirect( $this->generateUrl("viewCart") );
        
        
        
    }
    
    /**
    * @Route("/cart", name="viewCart")
    */
    
    public function viewCartAction() {
             
        $session = new Session();
        $product = $session->get('panier');
        $params = array(
            "product" => $product
                );
             
        return $this->render("cart/cart.html.twig", $params);
             
    }
}
