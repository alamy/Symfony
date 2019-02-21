<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of InicioController
 *
 * @author indra
 */
class InicioController extends AbstractController{
    
    public function __construct() {
        
    }
    
    public function InicioAction(Request $request): Response{
        return $this->render('inicio/inicio.html.twig');
    }
}
