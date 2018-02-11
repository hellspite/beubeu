<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;
use App\Entity\Exhibit;
use App\Entity\Performance;

class DefaultController extends Controller{

    /**
    * @Route("/", name="homepage")
    */
    public function index(){

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
                case "Event":
                    $articles[] = $this->getDoctrine()
                        ->getRepository(Event::class)
                        ->findById($n->getSourceId());
                    break;
                case "Meeting":
                    $articles[] = $this->getDoctrine()
                        ->getRepository(Meeting::class)
                        ->findById($n->getSourceId());
                    break;
                case "Performance":
                    $articles[] = $this->getDoctrine()
                        ->getRepository(Performance::class)
                        ->findById($n->getSourceId());
                    break;
                case "Street":
                    $articles[] = $this->getDoctrine()
                        ->getRepository(Street::class)
                        ->findById($n->getSourceId());
                    break;
                case "Workshop":
                    $articles[] = $this->getDoctrine()
                        ->getRepository(Workshop::class)
                        ->findById($n->getSourceId());
                    break;
            }
        }
        
        return $this->render('default/index.html.twig', array('articles' => $articles, 'classes' => $classes));
    }
}
