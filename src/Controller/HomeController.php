<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LinkRepository $repository): Response
    {
        $links = $repository->findBy([], orderBy: ["createdAt" => "desc"], limit: 20);
        return $this->render('home/index.html.twig', ["links" => $links]);
    }
}
