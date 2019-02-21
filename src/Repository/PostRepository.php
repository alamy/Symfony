<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostRepository
 *
 * @author indra
 */
class PostRepository extends ServiceEntityRepository{
    
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Post::class);
    }
    
}
