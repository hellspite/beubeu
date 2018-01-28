<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Performance;
use App\Entity\News;

class PerformanceController extends Controller
{
    /**
     * @Route("/performance", name="performance")
     */
    public function index()
    {
        $performances_new = $this->getDoctrine()
            ->getRepository(Performance::class)
            ->getThisYearByDate();

        $performances_old = $this->getDoctrine()
            ->getRepository(Performance::class)
            ->getOldByDate();

        return $this->render('performance/index.html.twig', array('new' => $performances_new, 'old' => $performances_old));
    }

    /**
    * @Route("/performance/{slug}", name="performance_show")
    */
    public function show($slug){
        
        $performance = $this->getDoctrine()
            ->getRepository(Performance::class)
            ->findOneBy(['slug' => $slug]);

        return $this->render('performance/show.html.twig', array('performance' => $performance));
    }
}
