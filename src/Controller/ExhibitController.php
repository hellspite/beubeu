<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Exhibit;
use App\Entity\News;

class ExhibitController extends Controller
{
    /**
     * @Route("/mostre", name="exhibit")
     */
    public function index()
    {
        $exhibits_new = $this->getDoctrine()
            ->getRepository(Exhibit::class)
            ->getThisYearByDate();

        $exhibits_old = $this->getDoctrine()
            ->getRepository(Exhibit::class)
            ->getOldByDate();

        return $this->render('exhibit/index.html.twig', array('new' => $exhibits_new, 'old' => $exhibits_old));
    }

    /**
    * @Route("/exhibit/new", name="exhibit_new")
    */
    public function newExhibit(){
        //TODO: Impostare il metodo reale
        $em = $this->getDoctrine()->getManager(); 

        $exhibit = new Exhibit();    

        $exhibit->setTitle('Test');
        $exhibit->setImage('test.jpg');
        $exhibit->setDescription('test test test test');
        $exhibit->setYear(2018);

        $em->persist($exhibit);

        $em->flush();

        $news = new News();
        $news->setSourceId($exhibit->getId());
        $news->setSource('Exhibit');

        $em->persist($news);

        $em->flush();
    }
}
