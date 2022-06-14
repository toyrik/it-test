<?php

namespace App\Controller;


use App\Entity\Author;
use App\Repository\AuthorRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/authors", name="author_index", methods={"GET"})
     */
    public function index(AuthorRepository $authorRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $query = $authorRepository->findAllQuery();
        $authors = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('author/userView.html.twig', [
            'authorsAll' => $authorRepository->findAll(),
            'authors' => $authors, 
            'totalCount' => $authors->getTotalItemCount()           
        ]);
    }
}
