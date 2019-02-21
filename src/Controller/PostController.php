<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Manager\PostManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller
{
    
    public function index(PostManager $postManager): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $postManager->findAll(),
        ]);
    }

    
    public function new(PostManager $postManager, Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $postManager->cadastrar($post);

            return $this->redirectToRoute('post_index');
        }

        return $this->render('post/new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }

    
    public function edit(PostManager $postManager, Request $request, Post $post): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postManager->editar($post);

            return $this->redirectToRoute('post_index', [
                'id' => $post->getId(),
            ]);
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    
    public function delete(PostManager $postManager, Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $postManager->deletar($post);
        }

        return $this->redirectToRoute('post_index');
    }
}
