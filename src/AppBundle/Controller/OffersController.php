<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class OffersController extends Controller{

    /**
     * @Route("/offers/{offer_id}", name="offers",
     *
     * defaults = {"offer_id" = 1}))
     */
     public function showAllProductsAction($offer_id)
    {
        $offerRepo = $this->getDoctrine()->getRepository("AppBundle:Offers");
        $offer = $offerRepo->findAll();

        $productsRepository = $this->getDoctrine()->getRepository("AppBundle:Products");
        $products = $productsRepository->findByOffer($offer_id);
        
        // message d'erreur quand l'utilisateur indique un mauvais id dans l 'URL
        if (!$products) {
            throw $this->createNotFoundException(
                'Aucun produit trouvé pour cet id : '.$offer_id
            );
        }

        //render retourne une réponse
        return $this->render('offers/offers.html.twig', array(
            "products" =>$products,
            "offers" =>$offer)
                );

    }

     /**
     * @Route("/offers/details/{productId}", name="details")
     *
     *
     */
     public function showDetailsAction($productId)
    {
        $offerRepo = $this->getDoctrine()->getRepository("AppBundle:Offers");
        $offer = $offerRepo->findAll();
        
        $productIdRepository = $this->getDoctrine()->getRepository("AppBundle:Products");
        $product = $productIdRepository->find($productId);
        
        // message d'erreur quand l'utilisateur indique un mauvais id dans l 'URL
        if (!$product) {
            throw $this->createNotFoundException(
                'Aucun produit trouvé pour cet id : '.$productId
            );
        }

        // render retourne une réponse
        return $this->render('offers/details.html.twig', array(
            "product" =>$product,
            "offers" =>$offer
                
                ));
    }
}
