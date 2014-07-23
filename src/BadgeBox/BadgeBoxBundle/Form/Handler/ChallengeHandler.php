<?php

namespace BadgeBox\BadgeBoxBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use BadgeBox\BadgeBoxBundle\Entity\Post;

class ChallengeHandler{

    protected $request;
    protected $form;
    protected $ip;
    protected $user;
    protected $challenge;
    protected $entityManager;
    protected $session;

    // protected $mailer; -> Si on veut envoyer un mail

    public function __construct(Form $form, Request $request, $entityManager, $challenge, $user )
    {
        $this->form             = $form;
        $this->request          = $request;
        $this->challenge        = $challenge;
        $this->ip               = $this->request->server->get('REMOTE_ADDR');
        $this->entityManager    = $entityManager;
        $this->user             = $user;
        $this->session          = new Session;
        // $this->mailer = $mailer; -> Si on veut envoyer un mail
    }

    public function process()
    {
        // Check the method
        if ('POST' == $this->request->getMethod())
        {
            // Bind value with form
            $this->form->bind($this->request);

            if ($this->form->isValid()) {
                   if($this->saveChallenge())
                   {
                       return $this->sendPost();
                   }
            }
            else
            {
                $this->session->getFlashBag()->add('notice_error','Votre annonce comporte une ou des erreurs, veuillez modifier les champs indiqués.');
            }

            // $data = $this->form->getData();
            //  $this->onSuccess($data); -> Si on veut envoyer un mail
        }

        return false;
    }

    public function saveChallenge()
    {
        $this->challenge->setIpadress($this->ip)
                        ->setUser($this->user);
                        //->getImage()->upload();
        $this->entityManager->persist($this->challenge);
        $this->entityManager->flush();

        return true;
    }

    public function sendPost()
    {
        $post = new Post;
        $post->setContent($this->challenge->getContent());
        $post->setUser($this->user);
        $post->setType(2);
        $post->setTitle($this->challenge->getTitle());
        $this->entityManager->persist($post);
        $this->entityManager->flush();

        return true;
    }

}