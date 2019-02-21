<?php
namespace App\Manager;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostMamager
 *
 * @author indra
 */
class PostManager {
    
    private $postRepository;
    private $entityManager;
    public function __construct(PostRepository $postRepository, EntityManagerInterface $entityManager) {
        $this->postRepository = $postRepository;
        $this->entityManager = $entityManager;
    }
    
    public function findAll(): ArrayCollection{
        return new ArrayCollection($this->postRepository->findAll());
    }
    
    public function find($id): ?Post{
        return $this->postRepository->find($id);
    }
    
    public function cadastrar(Post $post){
            $this->entityManager->persist($post);
            $this->entityManager->flush();
    }
    
    public function editar(Post $post){
         $this->entityManager->flush();
    }
    
    public function deletar(Post $post){
        
          $this->entityManager->remove($post);
          $this->entityManager->flush();
    }
    
}
