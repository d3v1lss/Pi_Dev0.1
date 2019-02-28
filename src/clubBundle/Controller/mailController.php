<?php

namespace clubBundle\Controller;
use clubBundle\Entity\Mail;
use clubBundle\Form\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




class mailController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Mail();
        $form=  $this->createForm(MailType::class,  $mail);


        // $request = Request::createFromGlobals();
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('hchaichi-akrem@outlook.fr')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        '@club/president/mailok.html.twig',
                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('mail_ok'));
        }

        return $this->render('@club/president/mail.html.twig'
            , array('form'=>$form->createView()));
    }

    public function successAction(){
        return new Response("email envoyé avec succès, Merci de vérifier votre adresse mail.");
    }
}
