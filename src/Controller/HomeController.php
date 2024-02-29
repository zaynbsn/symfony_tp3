<?php

namespace App\Controller;

use App\Entity\Link;
use App\Entity\Reaction;
use App\Entity\ReactionType;
use App\Form\AddLinkType;
use App\Repository\LinkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LinkRepository $repository): Response
    {
        $links = $repository->findBy([], orderBy: ["createdAt" => "desc"], limit: 20);
        return $this->render('home/index.html.twig', ["links" => $links]);
    }

    #[Route('/add', name: 'link_add')]
    public function add(Request $request): Response
    {
        $link = new Link();
        $link->setCreatedAt(new \DateTimeImmutable());
        $form = $this->createForm(AddLinkType::class, $link);
        $form->handleRequest($request);

        return $this->render('/home/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit/{id}/{type}', name: 'link_edit')]
    public function edit($id, $type, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Link::class);
        $reaction = new Reaction();
        $reaction->setLink($repository->find($id));
        if ($type === 'upvote') {
            $reaction->setType(ReactionType::Like->value);
        } else {
            $reaction->setType(ReactionType::Dislike->value);
        }

        $date = new \DateTimeImmutable("now");
        $reaction->setCreatedAt($date);
        $entityManager->persist($reaction);
        $entityManager->flush();
        return $this->redirectTo("/");
    }

    #[Route('/delete/{id}', name: 'link_delete')]
    public function delete($id, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Link::class);
        $link = $repository->find($id);
        $entityManager->remove($link);
        $entityManager->flush();
        return $this->redirectTo("/");
    }

    public function redirectTo($path): Response{
        return new RedirectResponse($path);
    }
}
