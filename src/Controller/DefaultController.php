<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('Default/index.html.twig');
    }

    public function about()
    {
        return $this->render('Default/about.html.twig');
    }

    public function sendmail()
    {
        $request=$this->get('request_stack')->getCurrentRequest();
        $textMail=$request->request->get('text_mail');
        $mailer = $this->get('mailer');
        $message = $mailer->createMessage()
            ->setSubject('Почта с сата моего портфолио')
            ->setFrom('noreplay@portfolio.cotrip.ru')
            ->setTo('mbusiness.iv@gmail.com')
            ->setBody(
                $textMail,
                'text/html'
            );
        $mailer->send($message);

        return $this->redirect($this->generateUrl('my_portfolio_homepage'));
    }

    public function experience()
    {
        return $this->render('Default/experience.html.twig');
    }

    public function projects()
    {
        return $this->render('Default/projects.html.twig');
    }

    public function technology()
    {
        return $this->render('Default/technology.html.twig');
    }

    public function interest()
    {
        return $this->render('Default/interest.html.twig');
    }
    public function hobby()
    {
        return $this->render('Default/hobby.html.twig');
    }

    public function search()
    {
        return $this->render('Default/search.html.twig');
    }
}
