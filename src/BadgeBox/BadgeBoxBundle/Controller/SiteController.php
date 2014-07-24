<?php

namespace BadgeBox\BadgeBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BadgeBox\BadgeBoxBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use BadgeBox\BadgeBoxBundle\Form\Handler\PostHandler;
use BadgeBox\BadgeBoxBundle\Form\PostType;

class SiteController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->container->get('security.context'); // Le controleur de sécurité

        if(!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->render('BadgeBoxBundle:Site:index.html.twig');
        }
        return $this->redirect($this->generateUrl('badge_box_home'));
    }

    public function offlineAction()
    {
        return $this->render('BadgeBoxBundle:Site:offline.html.twig');
    }

    public function headerAction()
    {
        return $this->render('BadgeBoxBundle:Site:header.html.twig');
    }

    public function homeAction()
    {
        $securityContext = $this->container->get('security.context'); // Le controleur de sécurité
        if(!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->render('BadgeBoxBundle:Site:index.html.twig');
        }
        $user	= $securityContext->getToken()->getUser(); // L'utilisateur courant

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BadgeBoxBundle:Post');

        $all_post   = $repository->findBy(array('user' => $user), array('date' => 'DESC'));

        return $this->render('BadgeBoxBundle:Site:home.html.twig', array('post' => $all_post));
    }

    public function postAction(Request $request){

        $securityContext = $this->container->get('security.context'); // Le controleur de sécurité

        if(!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        // Initialisation du processus
        $entityManager  = $this->getDoctrine()->getManager(); // L'entityManager
        $user	= $securityContext->getToken()->getUser(); // L'utilisateur courant

        $post = new Post;

        $form = $this->createForm(new PostType(), $post); // Le formulaire

        // On transmet le tout au PostHandler
        $formHandler 	= new PostHandler($form, $request, $entityManager, $post, $user);

        // Validation du formulaire
        $process 		= $formHandler->process();

        // On envoie le tout à la validation via le PostHandler
        if($process)
        {
            // Launch the message flash
            $this->get('session')->getFlashBag()->add('notice','Votre Post à bien été enregistré');

            return $this->redirect(($this->generateUrl('badge_box_home')));
        }

        return $this->render('BadgeBoxBundle:Site:post.html.twig', array('form' => $form->createView()));


    }

    public function aurevoirAction()
    {
        return $this->render('BadgeBoxBundle:Site:deconnected.html.twig');
    }
}
