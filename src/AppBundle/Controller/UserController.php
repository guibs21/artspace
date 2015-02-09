<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

use AppBundle\Entity\User;
use AppBundle\Form\RegistrationType;


use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class UserController extends Controller {
 /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {


        $session = $request->getSession();

    // get the login error if there is one
    if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(
            Security::AUTHENTICATION_ERROR
        );
    } elseif (null !== $session && $session->has(Security::AUTHENTICATION_ERROR)) {
        $error = $session->get(Security::AUTHENTICATION_ERROR);
        $session->remove(Security::AUTHENTICATION_ERROR);
    } else {
        $error = '';
    }
      // last username entered by the user
    $lastUsername = (null === $session) ? '' : $session->get(Security::LAST_USERNAME);


    return $this->render(
        'User/login.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
            )
        );

     }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {

    }

     /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {

//        if($this->getUser()) {
//            return $this->redirect($this->generateUrl("offers"));
//        }

//on crée un utilisateur vide
        $user = new User();

        //on récupère une instance du formulaire associé à l'utilisateur vide
        $registrationForm = $this->createForm(new RegistrationType(), $user);

        //traitement du formulaire
        $registrationForm->handleRequest( $request);



        if( $registrationForm->isValid() ){
            //hydrate les autres propriétes du User


            //générer un salt
            $salt = $this->get('string_helper')->randomString(50);
            $user->setSalt( $salt );

            //générer un token
            $token = $this->get('string_helper')->randomString(30);
            $user->setToken( $token);

//            dump($user);

            //hacher le mot de passe sha 512, 5000 fois
            $encoder = $this->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $user->getPassword() );
            $user->setPassword( $encoded );

            // date d'inscription et de modification
            $user->setDateRegistered( new\DateTime() );
            $user->setDateModified( new\DateTime() );

            //assigne toujours ce rôle auxs utilisateurs du front office
            $user->setRoles( array("ROLE_USER") );

            //sauvegarde le User en BDD
            $em = $this->get("doctrine")->getManager();
            $em->persist( $user );
            $em->flush();
            return $this->redirect($this->generateUrl("login"));

        }

        // on shoot le formulaire à twig (on n'oublie pas le createView !)
        $params = array(
            "registrationForm" => $registrationForm->createView()
                );

        return $this->render('User/register.html.twig', $params);
    }


}
