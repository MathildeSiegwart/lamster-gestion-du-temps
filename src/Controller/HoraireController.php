<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Entity\TypeHoraire;
use App\Repository\HoraireRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\HoraireSearchType;
use App\Form\HoraireCreateType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class HoraireController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET","POST"})
     * @param Request $request
     * @param HoraireRepository $repository
     * @return Response
     */
    public function index(Request $request, HoraireRepository $repository) : Response
    {
        $types = $this->getDoctrine()->getRepository(TypeHoraire::class)->findAll();
        $searchForm = $this->createForm(HoraireSearchType::class);
        $searchForm->handleRequest($request);
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            //dd($searchForm);
            $nom = $searchForm->getData();

            $horaires = $repository->findByName($nom['nom']);


            if ($horaires === null) {
                $this->addFlash('erreur', 'Aucun horaire contenant ce mot clé dans son nom n\'a été trouvé, essayez en un autre.');

            }
        }else{
            $horaires = $repository->findAll();
        }



        return $this->render('horaire/index.html.twig',
            ['horaires' => $horaires,
                'types'=> $types,
                'searchForm' => $searchForm->createView()]);
    }

    /**
     * @Route("/horaires/create", methods={"GET", "POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $horaire = new Horaire;
        $createForm = $this->createForm(HoraireCreateType::class, $horaire);
        $createForm->handleRequest($request);

        if($createForm->isSubmitted() && $createForm->isValid()){
            $horaire = $createForm->getData();
            $em->persist($horaire);
            $em->flush();
            return $this->redirect('/');
        }

        return $this->render('horaire/create.html.twig', ['createForm' => $createForm->createView()]);
    }

    /**
     * @Route("/horaire/edit/{id}", name="edit", methods={"GET", "POST"})
     * @param $id
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */
    public function edit($id, Request $request, EntityManagerInterface $em)
    {
        $horaire = $this->getDoctrine()->getRepository(Horaire::class)->find($id);
        $editForm = $this->createForm(HoraireCreateType::class, $horaire);
        $editForm->handleRequest($request);

        if($editForm->isSubmitted() && $editForm->isValid()){
            $horaire = $editForm->getData();
            $date = new \DateTime();
            $horaire->setDateModification($date);
            $em->flush();
            return $this->redirect('/');
        }

        return $this->render('horaire/create.html.twig', ['createForm' => $editForm->createView()]);
    }

    /**
     * @Route("/horaire/delete/{id}", name="delete", methods={"GET", "POST"})
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */
    public function delete($id, EntityManagerInterface $em){
        $horaire = $this->getDoctrine()->getRepository(Horaire::class)->find($id);
        $em->remove($horaire);
        $em->flush();
        return $this->redirect('/');
    }

    /**
     * @Route("/horaire/sort/{champ}", name="sort", methods={"GET", "POST"})
     * @return RedirectResponse|Response
     */
    public function sort($champ){

        return $this->redirect('/');
    }
}
