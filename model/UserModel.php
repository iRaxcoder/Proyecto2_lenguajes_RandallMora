<?php

class UserModel{
    protected $db;


    public function __construct()
    {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }

    

}



