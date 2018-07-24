<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Press;

class PressController extends Controller
{
    /**
     * @Route("/press", name="press")
     */
    public function index()
    {
        $press = $this->getDoctrine()
            ->getRepository(Press::class)
            ->findOneById(1);

        return $this->render('press/index.html.twig', [
            'press' => $press,
        ]);
    }
}
