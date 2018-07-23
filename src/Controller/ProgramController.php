<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Program;

class ProgramController extends Controller
{
    /**
     * @Route("/programma", name="program")
     */
    public function index()
    {
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneById(1);

        return $this->render('program/index.html.twig', [
            'program' => $program,
        ]);
    }
}
