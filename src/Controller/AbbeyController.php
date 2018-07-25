<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Abbey;

class AbbeyController extends Controller
{
    /**
     * @Route("/abbazia", name="abbey")
     */
    public function index()
    {
        $abbey = $this->getDoctrine()
            ->getRepository(Abbey::class)
            ->findOneById(1);

        return $this->render('abbey/index.html.twig', [
            'abbey' => $abbey,
        ]);
    }
}
