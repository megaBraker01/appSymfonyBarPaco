<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="inicio")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/index.html.twig');
    }

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        return $this->render('frontal/nosotros.html.twig');
    }

    /**
     * @Route("/contactar/{sitio}", name="contactar")
     */
    public function contactarAction(Request $request, $sitio = "todos")
    {
        switch($sitio){
            case "vlc": $ret = 'bares-vlc.html.twig';
            break;
            case "bcn": $ret = 'bares-bcn.html.twig';
            break;
            case "mdr": $ret = 'bares-mdr.html.twig';
            break;
            case "todos": $ret = 'bares.html.twig';
            break;
            default: $ret = 'bares.html.twig';
        }
        return $this->render("frontal/$ret");
    }
}
