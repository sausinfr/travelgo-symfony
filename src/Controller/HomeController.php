<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $repo): Response
    {
        $lastPosts = $repo->lastPosts();
        return $this->render('home/index.html.twig', [
            'lastPosts' => $lastPosts
        ]);
    }
}
