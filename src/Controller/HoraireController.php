<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HoraireController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index() : Response
    {
        return $this->render('horaire/index.html.twig');
    }
}
