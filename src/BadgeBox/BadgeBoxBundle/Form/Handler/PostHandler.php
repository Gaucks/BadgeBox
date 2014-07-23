<?php

namespace BadgeBox\BadgeBoxBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PostHandler{

    protected $request;
    protected $form;
    protected $ip;
    protected $user;
    protected $post;
    protected $entityManager;
    protected $session;

    // protected $mailer; -> Si on veut envoyer un mail

    public function __construct(Form $form, Request $request, $entityManager, $post, $user )
    {
        $this->form             = $form;
        $this->request          = $request;
        $this->post             = $post;
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

                return $this->savePost();
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

        public function savePost()
        {
            $this->post->setIpadress($this->ip)
                       ->setUser($this->user);
                //->getImage()->upload();

            $this->entityManager->persist($this->post);
            $this->entityManager->flush();

            return true;
        }
}