<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Workshop;
use App\Entity\News;

class WorkshopController extends Controller
{
    /**
     * @Route("/workshop", name="workshop")
     */
    public function index()
    {
        $workshops_new = $this->getDoctrine()
            ->getRepository(Workshop::class)
            ->getThisYearByDate();

        $workshops_old = $this->getDoctrine()
            ->getRepository(Workshop::class)
            ->getOldByDate();

        return $this->render('workshop/index.html.twig', array('new' => $workshops_new, 'old' => $workshops_old));
    }

    /**
    * @Route("/workshop/{slug}", name="workshop_show")
    */
    public function show($slug){
        
        $workshop = $this->getDoctrine()
            ->getRepository(Workshop::class)
            ->findOneBy(['slug' => $slug]);

        return $this->render('workshop/show.html.twig', array('workshop' => $workshop));
    }
}
