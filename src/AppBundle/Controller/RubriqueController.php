<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Rubrique;


class RubriqueController extends Controller
{
    /**
     * @Route("/admin/rubrique", name="rubrique")
     */
    public function indexAction()
    {
        $rubriques = $this->getDoctrine()->getRepository('AppBundle:Rubrique')->findAll();

            $params = array(
                'rubriques' => $rubriques
            );

        return $this->render('admin/rubrique/rubrique.html.twig', $params);
    }
    
    /**
    *  @Route("/admin/rubrique/ajout", name="ajout_rubrique", defaults = { "id" = null })
    *
    *  @Route("/admin/rubrique/maj_rubrique/{id}", name="maj_rubrique")
    * 
    */
    public function formAction(Request $request, $id) {

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $rc = $doctrine->getRepository('AppBundle:Rubrique');

        if(!$id) {
            $rubrique = new Rubrique();
        }else {
            $rubrique = $rc->find($id);
        }

        //crée le formulaire
        $rubriqueForm = $this->createForm(new rubriqueType(), $rubrique);

        // injecte les données soumises dans notre instance de Product
        $rubriqueForm->handleRequest($request);
            
        //si le formulaire est soumis et valide
        if ($rubriqueForm->isValid() && $rubriqueForm->isValid()) {

            //sauvegarde l'entité...
            //récupère l'entity manager
            $em = $this->getDoctrine()->getManager();
            //demande à Doctrine de sauvegarder notre instance
            $em->persist($rubrique);
            //exécute les requêtes
            $em->flush();

        return $this->redirect($this->generateUrl('rubrique'));
        }

        //shoot le formulaire à la vue
        $params = array(
            "rubriqueForm" => $rubriqueForm->createView()
        );

        return $this->render('admin/rubrique/ajout_rubrique.html.twig', $params);
    }

    /**
    * @Route("/admin/rubrique/delete_category/{id}", name="supp_rubrique")
    */
    public function suppAction($id) {

        $doctrine = $this->getDoctrine();
        $rc = $doctrine->getRepository('AppBundle:Rubrique');
            
        $entity = $rc->find($id);

        $em = $doctrine->getManager();
        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('rubrique'));
    }    
}
