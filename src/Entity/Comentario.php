<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use DateTime;

/**
 * Description of Comentarios
 *
 * @author indra
 */
class Comentario {
    
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var string Nome do Autor
     */
    private $nome;
    
    /**
     *
     * @var string Conteudo do comentario
     */
    private $conteudo;
    
    /**
     *
     * @var Post
     */
    private $post;
    
    /**
     *
     * @var dateTime data d e criação do comentario
     */
    private $dataCriacao;
    
    public function __construct() {
        $this->dataCriacao = new DateTime();   
    }
    
    public function getId(): int{
        return $this->id;
    }
    
    public function getNome(): ?string{
        return $this->nome;
    }
    
    public function setNome(string $nome): void{
        $this->nome = $nome;
    }
    
    public function getConteudo(): ?string{
        return $this->conteudo;
    }
    
    public function setConteudo(string $conteudo): void{
        $this->conteudo = $conteudo;
    }
    
    public function getDataCriacao(): ?\DateTime{
        return $this->dataCriacao;
    }
    
    public function getPost(): Post {
        return $this->post;
    } 
    
    public function setPost(?Post $post) : void{
        $this->post = $post;
    }
    
    
}
