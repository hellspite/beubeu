<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Street;
use App\Entity\News;

class StreetController extends Controller
{
    /**
     * @Route("/interventi", name="street")
     */
    public function index()
    {
        $streets_new = $this->getDoctrine()
            ->getRepository(Street::class)
            ->getThisYearByDate();

        $streets_old = $this->getDoctrine()
            ->getRepository(Street::class)
            ->getOldByDate();

        return $this->render('street/index.html.twig', array('new' => $streets_new, 'old' => $streets_old));
    }

    /**
    * @Route("/interventi/{slug}", name="street_show")
    */
    public function show($slug){
        
        $street = $this->getDoctrine()
            ->getRepository(Street::class)
            ->findOneBy(['slug' => $slug]);

        return $this->render('street/show.html.twig', array('street' => $street));
    }
}
