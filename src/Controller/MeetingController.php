<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Meeting;
use App\Entity\News;

class MeetingController extends Controller
{
    /**
     * @Route("/meeting", name="meeting")
     */
    public function index()
    {
        $meetings_new = $this->getDoctrine()
            ->getRepository(Meeting::class)
            ->getThisYearByDate();

        $meetings_old = $this->getDoctrine()
            ->getRepository(Meeting::class)
            ->getOldByDate();

        return $this->render('meeting/index.html.twig', array('new' => $meetings_new, 'old' => $meetings_old));
    }

    /**
    * @Route("/meeting/{slug}", name="meeting_show")
    */
    public function show($slug){
        
        $meeting = $this->getDoctrine()
            ->getRepository(Meeting::class)
            ->findOneBy(['slug' => $slug]);

        return $this->render('meeting/show.html.twig', array('meeting' => $meeting));
    }
}
