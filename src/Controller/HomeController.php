<?php

namespace App\Controller;

use App\Entity\Blogposts;
use App\Repository\BlogpostsRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ProductsRepository $productsRepository, BlogpostsRepository $blogpostsRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'products' => $productsRepository->lastProd(),
            'blogposts' => $blogpostsRepository->lastPost(),
        ]);
    }
}
