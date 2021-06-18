<?php


class IndexController{


    public function __construct()
    {
        $this->view=new View();
    } 

    public function mostrar(){
        $data['informacion']=null;
         
         $this->view->show("IndexView.php", $data);
    }

}


