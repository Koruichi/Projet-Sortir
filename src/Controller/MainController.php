<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Repository\ParticipantRepository;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function home(SortieRepository $repository): Response

    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            $user = $this->getUser();
            $sorties = $repository->findALl();
            return $this->render('main/index.html.twig', ['user'=>$user, 'sorties'=>$sorties]);
        }
    }

    /**
     * @Route("/profil", name="app_profil")
     */

    
    public function profil(): Response
    {
        return $this->render('main/profil.html.twig', []);
    }

    /**
     * @Route("/ville", name="app_ville")
     */
    public function ville(): Response
    {
        return $this->render('admin/ville.html.twig', []);
    }

    /**
     * @Route("/site", name="app_site")
     */
    public function site(): Response
    {
        return $this->render('admin/site.html.twig', []);
    }


}
