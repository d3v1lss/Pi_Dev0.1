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
        $form->handleRequest($request) ;


        if ($form->isValid()) {

            $from = $mail->getFrom();
            $to = $mail->getTo();
            $objet = $mail->getObjet();
            $text= $mail->getText();





            $message = \Swift_Message::newInstance()

                ->setFrom($from)
                ->setTo($to)
                ->setSubject($objet)
                ->setBody($text);

            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('mail_ok'));
        }



        return $this->render('@club/president/mail.html.twig'
            , array('form'=>$form->createView()));
    }

    public function successAction(){
        return $this->render('@club/president/mailok.html.twig');
    }
}
