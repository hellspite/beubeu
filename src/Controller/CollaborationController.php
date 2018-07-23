<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Collaboration;

class CollaborationController extends Controller
{
    /**
     * @Route("/collaborazioni", name="collaboration")
     */
    public function index()
    {
        $collaboration = $this->getDoctrine()
            ->getRepository(Collaboration::class)
            ->findOneById(1);

        return $this->render('collaboration/index.html.twig', [
            'collaboration' => $collaboration,
        ]);
    }
}
