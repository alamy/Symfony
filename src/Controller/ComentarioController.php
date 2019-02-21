<?php

namespace App\Controller;

use App\Entity\Comentario;
use App\Form\ComentarioType;
use App\Manager\ComentarioManager;
use App\Manager\PostManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comentario")
 */
class ComentarioController extends Controller
{
    
    public function index(ComentarioManager $comentarioManager): Response
    {
        return $this->render('comentario/index.html.twig', [
            'comentarios' => $comentarioManager->findAll(),
        ]);
    }

    
    public function new(PostManager $postManager ,ComentarioManager $comentarioManager, Request $request, $post): Response
    {
        
        $postEntity = $postManager->find($post);
        
        if($postEntity === null){
            throw new NotFoundHttpException();
        }
        
        $comentario = new Comentario();
        $postEntity->addComentario($comentario);
        $form = $this->createForm(ComentarioType::class, $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comentarioManager->cadastrar($comentario);

            return $this->redirectToRoute('post_index');
        }

        return $this->render('comentario/new.html.twig', [
            'comentario' => $comentario,
            'form' => $form->createView(),
        ]);
    }

  
    public function show(Comentario $comentario): Response
    {
        return $this->render('comentario/show.html.twig', [
            'comentario' => $comentario,
        ]);
    }

   
    public function edit(ComentarioManager $comentarioManager, Request $request, Comentario $comentario): Response
    {
        $form = $this->createForm(ComentarioType::class, $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comentarioManager->editar($comentario);

            return $this->redirectToRoute('comentario_index', [
                'id' => $comentario->getId(),
            ]);
        }

        return $this->render('comentario/edit.html.twig', [
            'comentario' => $comentario,
            'form' => $form->createView(),
        ]);
    }

   
    public function delete(Request $request, Comentario $comentario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comentario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comentario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comentario_index');
    }
}
