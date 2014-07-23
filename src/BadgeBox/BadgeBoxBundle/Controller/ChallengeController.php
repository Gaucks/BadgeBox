<?php

namespace BadgeBox\BadgeBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BadgeBox\BadgeBoxBundle\Entity\Challenge;
use BadgeBox\BadgeBoxBundle\Form\ChallengeType;
use BadgeBox\BadgeBoxBundle\Form\Handler\ChallengeHandler;

use BadgeBox\BadgeBoxBundle\Entity\Post;

class ChallengeController extends Controller {

    public function quickCreateAction(Request $request)
    {
        $securityContext = $this->container->get('security.context'); // Le controleur de sécurité
        if(!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->render('BadgeBoxBundle:Site:index.html.twig');
        }

        // Initialisation du processus
        $entityManager  = $this->getDoctrine()->getManager(); // L'entityManager
        $user	= $securityContext->getToken()->getUser(); // L'utilisateur courant
        $challenge = new Challenge();
        $form = $this->createForm(new ChallengeType(), $challenge);

        // Initialisation du FormHandler
        $formHandler = new ChallengeHandler($form, $request, $entityManager, $challenge, $user);

        // Validation du formulaire
        $process = $formHandler->process();

        if($process)
        {
            // Launch the message flash
            $this->get('session')->getFlashBag()->add('notice','Votre Post à bien été enregistré');
            return $this->redirect(($this->generateUrl('badge_box_home')));
        }

        $challenges = $entityManager->getRepository('BadgeBoxBundle:Challenge')->findBy(array('user' => $user),
                                                                                        array('date' => 'DESC'),
                                                                                        6);

        return $this->render('BadgeBoxBundle:Challenge:quick-create.html.twig', array('form' => $form->createView(), 'challenges' => $challenges ));
    }

    public function showAction($id)
    {
        // L'entity manager
        $em = $this->getDoctrine()->getManager();
        // Le repository
        $repository = $em->getRepository('BadgeBoxBundle:Challenge');
        // Recherche du challenge par son $id
        $challenge = $repository->find($id);

        if(!$challenge)
        {
            throw new \RuntimeException('Le challenge"'.$id.'" n\'existe pas');
        }

        return $this->render('BadgeBoxBundle:Challenge:challenge.html.twig', array('challenge' => $challenge));
    }
} 