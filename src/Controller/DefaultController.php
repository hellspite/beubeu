<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;
use App\Entity\Exhibit;

class DefaultController extends Controller{

    /**
    * @Route("/", name="homepage")
    */
    public function index(){

        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->getAllByDate();

        $articles = [];
        foreach($news as $n){
            //TODO: Rendere dinamica la selezione del repository
            $articles[] = $this->getDoctrine()
                ->getRepository(Exhibit::class)
                ->findById($n->getSourceId());
        }
        
        return $this->render('default/index.html.twig');
    }
}
