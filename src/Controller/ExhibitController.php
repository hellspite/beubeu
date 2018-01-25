<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Exhibit;

class ExhibitController extends Controller
{
    /**
     * @Route("/exhibit", name="exhibit")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
    * @Route("/exhibit/new", name="exhibit_new")
    */
    public function newExhibit(){
        //TODO: Impostare il metodo reale
        $exhibit = new Exhibit();    

        $exhibit->setTitle('Test');
        $exhibit->setImage('test.jpg');
        $exhibit->setDescription('test test test test');
        $exhibit->setYear(2018);

        $em = $this->getDoctrine()->getManager(); 

        $em->persist($exhibit);
        $em->flush();
    }
}
