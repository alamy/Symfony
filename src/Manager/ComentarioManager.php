<?php
namespace App\Manager;

use App\Entity\Comentario;
use App\Repository\ComentarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComentarioManager
 *
 * @author indra
 */
class ComentarioManager {
    private $comentarioRepository;
    private $entityManager;
    
    public function __construct(ComentarioRepository $comentarioRepository, EntityManagerInterface $entityManager) {
        $this->comentarioRepository = $comentarioRepository;
        $this->entityManager = $entityManager;
    }
    
    public function findAll(): ArrayCollection {
        return new ArrayCollection($this->comentarioRepository->findAll());
    }
    
    public function cadastrar(Comentario $comentario){ 
            $this->entityManager->persist($comentario);
            $this->entityManager->flush();
    }
    
    public function editar(Comentario $comentario) {
            $this->entityManager->flush();
    }
    
    public function deletar(Comentario $comentario) {
        
            $this->entityManager->remove($comentario);
            $this->entityManager->flush();
    }
}
