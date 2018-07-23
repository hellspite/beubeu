<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\About;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function index()
    {
        $about = $this->getDoctrine()
            ->getRepository(About::class)
            ->findOneById(1);

        return $this->render('about/index.html.twig', [
            'about' => $about,
        ]);
    }
}
