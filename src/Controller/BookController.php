<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/books", name="book_index", methods={"GET"})
     */
    public function index(
        BookRepository $bookRepository,
        Request $request,
        PaginatorInterface $paginator
        ): Response
    {
        $booksQuery =$bookRepository->findAllQuery();
        
        $books = $paginator->paginate(
            $booksQuery,
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('book/userView.html.twig', [
            'books' => $books,
            'order'=> $request->get('order')
        ]);
    }
}
