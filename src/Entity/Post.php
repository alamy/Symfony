<?php
namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author indra
 */
class Post {
    
    /**
     *
     * @var integer
     */
    private $id;


    /**
     * @var string Título do Post
     */
    private $titulo;
    
    /**
     * @var string Conteúdo do Post
     */
    private $conteudo;
    
    /**
     *
     * @var DateTime Data de criação do post
     */
    private $dataCriacao;
    
    
    /**
     *
     * @var ArrayCollection|Comentario[] Comentários do Post
     */
    private $comentarios;
    
    public function __construct() {
        $this->dataCriacao = new DateTime();
        
        $this->comentarios = new ArrayCollection();
    }
    
    public function getTitulo(): ?string{
        return $this->titulo;
    }
    
    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }
    
    public function getConteudo(): ?string{
        return $this->conteudo;
    }
    
    public function setConteudo(string $conteudo): void {
        $this->conteudo = $conteudo;
    }
    
    public function getDataCriacao(): ?\DateTime {
        return $this->dataCriacao;
    }
    
    
    public function addComentario(Comentario $comentario): void {
        if(!$this->comentarios->contains($comentario)){
            $this->comentarios->add($comentario);
            
            $comentario->setPost($this);
        }
    }
    
    public function removeComentario(Comentario $comentario): void{
        if($this->comentarios->contains($comentario)){
            $this->comentarios->removeElement($comentario);
            
            $comentario->setPost(null);
        }    
    }
    
    public function getComentario(): ArrayCollection{
        return $this->comentarios;
    }
    
    public function getId(): int {
        return $this->id;
    }
}

