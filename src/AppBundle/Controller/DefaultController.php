<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="inicio")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getRepository(Tapa::class);
        $tapas = $em->findAll();
        // replace this example code with whatever you need
        return $this->render('frontal/index.html.twig', ['tapas' => $tapas]);
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
            case "vlc":
                $ciudad = 'Valencia';
                $mapSrc = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d197294.47340645303!2d-0.5015954687885393!3d39.40770125212401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2sValencia!5e0!3m2!1ses!2ses!4v1554279789308!5m2!1ses!2ses';
            break;
            case "bcn":
                $ciudad = 'Barcelona';
                $mapSrc = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.33921663332!2d2.078556139958734!3d41.39489748955842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona!5e0!3m2!1ses!2ses!4v1554361864401!5m2!1ses!2ses';
            break;
            case "mdr":
                $ciudad = 'Madrid';
                $mapSrc = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194348.1398105032!2d-3.8196206842121603!3d40.43786975948415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid!5e0!3m2!1ses!2ses!4v1554361764016!5m2!1ses!2ses';
            break;
            case "todos":
                $ciudad = 'Central';
                $mapSrc = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194348.1398105032!2d-3.8196206842121603!3d40.43786975948415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid!5e0!3m2!1ses!2ses!4v1554361764016!5m2!1ses!2ses';
            break;
            default:
                $ciudad = 'Central';
                $mapSrc = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194348.1398105032!2d-3.8196206842121603!3d40.43786975948415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid!5e0!3m2!1ses!2ses!4v1554361764016!5m2!1ses!2ses';
        }
        return $this->render("frontal/bares.html.twig", ['ciudad' => $ciudad, 'mapSrc' => $mapSrc]);
    }

    /**
     * @Route("/tapa/{id}", name="tapa")
     */
    // public function tapaAction(Request $request)
    // {
    //     $em = $this->getDoctrine()->getRepository(Tapa::class);
    //     $tapa = $em->findOneById($id);
    //     return $this->render("frontal/tapa.html.twig", ['tapa' => $tapa]);
    // }
}
