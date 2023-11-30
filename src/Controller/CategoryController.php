<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category/{slug}', name: 'category', methods: ['GET'])]
    public function index(EntityManagerInterface $em, $slug): Response
    {
        $category = $em->getRepository(Category::class)->findOneBy(['slug' => $slug]);
        if (!$category) {
            return $this->redirectToRoute('home');
        }

        return $this->render('category/index.html.twig', [
            'category' => $category
        ]);
    }
}
