<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CommandController extends Controller {

    /**
    * @Route("/commands", name="commands")
    *
    *
    */
     public function showAllCommandsAction()
    {
        $commandRepo = $this->getDoctrine()->getRepository("AppBundle:Command");
        $user = $this->getUser();
        $command = $commandRepo->findByUser($user);

        //render retourne une réponse
        return $this->render('commands/viewCommands.html.twig', array(
            "commands" =>$command,
            ));

    }

    /**
    * @Route("/commands/detailsCommands/{commandId}", name="detailsCommands")
    *
    *
    */
     public function showDetailsCommandsAction($commandId)
    {
        $commandRepo = $this->getDoctrine()->getRepository("AppBundle:Command");
        $command = $commandRepo->find($commandId);
        
        $detailsCommandsRepository = $this->getDoctrine()->getRepository("AppBundle:DetailsCommands");
        $detailsCommands = $detailsCommandsRepository->findByCommand($command);

        //render retourne une réponse
        return $this->render('commands/detailsCommands.html.twig', array(
            "command" =>$command,
            "detailsCommands" =>$detailsCommands
               ));

    }
}

