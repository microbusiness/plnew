<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route(
        path: '/{_locale}',
        name: 'index',
        defaults: ['_locale' => 'en'],
        locale: 'en',
    )]
    public function index(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/index.html.twig');
    }

    #[Route('/about', name: 'about')]
    public function about(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/about.html.twig');
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

        return $this->redirect($this->generateUrl('index'));
    }

    #[Route('/experience', name: 'experience')]
    public function experience(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/experience.html.twig');
    }

    #[Route('/projects', name: 'projects')]
    public function projects(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/projects.html.twig');
    }

    #[Route('/technology', name: 'technology')]
    public function technology(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/technology.html.twig');
    }

    #[Route('/interest', name: 'interest')]
    public function interest(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/interest.html.twig');
    }

    #[Route(
        path: '/{_locale}/hobby',
        name: 'hobby',
        defaults: ['_locale' => 'en'],)]
    public function hobby(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/hobby.html.twig');
    }

    #[Route(
        path: '/{_locale}/search',
        name: 'search',
        defaults: ['_locale' => 'en'],)]
    public function search(Request $request)
    {
        return $this->render('Default/'.$request->getLocale().'/search.html.twig');
    }
}
