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

        //TODO: completare funzione

        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->getAllByDate();

        $articles = [];
        $classes = [];
        foreach($news as $n){
            $class = $n->getSource();
            $classes[] = strtolower($n->getSource());
            switch($class){
                case "Exhibit":
                    $articles[] = $this->getDoctrine()
                        ->getRepository(Exhibit::class)
                        ->findById($n->getSourceId());
                    break;
            }
        }
        
        return $this->render('default/index.html.twig', array('articles' => $articles, 'classes' => $classes));
    }
}
