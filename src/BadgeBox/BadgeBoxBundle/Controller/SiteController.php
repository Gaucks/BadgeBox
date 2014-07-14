<?php

namespace BadgeBox\BadgeBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('BadgeBoxBundle:Site:index.html.twig');
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
