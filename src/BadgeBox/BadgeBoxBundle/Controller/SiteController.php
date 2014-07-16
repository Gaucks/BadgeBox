<?php

namespace BadgeBox\BadgeBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        return $this->render('BadgeBoxBundle:Site:home.html.twig');
    }
}
