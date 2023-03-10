<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private ProductRepository $repo;
    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @Route("/", name="home_page")
     */
    public function homeAction(): Response
    {
        $products = $this->repo->findAll();
        return $this->render(
            'main/index.html.twig',
            [
                'products' => $products
            ]
        );
    }

    /**
     * @Route("/product", name="showProduct")
     */
    public function showProductAction(): Response
    {
        return $this->render('product/show.html.twig');
    }

    /**
     * @Route("/danaischgStore", name="aboutUs")
     */
    public function aboutUsAction(): Response
    {
        return $this->render('about/index.html.twig');
    }
}
