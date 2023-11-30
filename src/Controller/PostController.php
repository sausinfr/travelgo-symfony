<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/post/{slug}', name: 'post')]
    public function index(EntityManagerInterface $em, $slug): Response
    {
        $post = $em->getRepository(Post::class)->findOneBy(['slug' => $slug]);
        if (!$post) {
            return $this->redirectToRoute('home');
        }

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }
}
