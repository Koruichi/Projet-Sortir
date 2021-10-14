<?php

namespace App\Controller;

use App\Repository\ParticipantRepository;
use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function home(): Response

    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('main/index.html.twig', []);
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

    public function detail($id, ParticipantRepository $repository): Response{
        $user = $repository->find($id);
        return $this->render('index.html.twig', ['user'=>$user]);
    }

}
