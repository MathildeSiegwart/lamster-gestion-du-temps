<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Entity\TypeHoraire;
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

        $em = $this->getDoctrine()->getManager();

        $type = new TypeHoraire;
        $type->setNom('type2');

        $em->persist($type);
        $em->flush();

        /*$horaire = new Horaire;
        $horaire->setNom('Nom');
        $horaire->setCommentaire('Commentaire');
        //$horaire->setDateHeureDebut(date());
        //$horaire->setDateHeureFin(date());
        $horaire->setNiveauPriorite(0);
        //$horaire->setDateCreation(date());
        //$horaire->setDateModification(date());
        $horaire->setType($type);


        
        $em->persist($horaire);
        $em->flush();*/

        return $this->render('horaire/index.html.twig');
    }

    /**
     * @Route("/horaires/create")
     */
    public function create()
    {
        return $this
    }
}
