<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author XPC
 */
class MainController {
    public function __construct() {
        $this->view = new View();
    } // constructor
    
     public function mostrar(){
         $data['listado']=null;
         
         $this->view->show("mainView.php", $data);
     } // listar
     
} // fin clase
