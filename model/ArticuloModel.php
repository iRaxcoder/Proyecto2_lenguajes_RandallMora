<?php

class ArticuloModel
{
    public function __construct()
    {
    }

    public function mostrar_categorias()
    {
        $url = "http://localhost/API_REST_ArtiMax/indexAPI.php";


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if ($e = curl_error($ch)) {
            echo $e;
        } else {
           return json_decode($resp,true) ;
        }
        curl_close($ch);
    }
}
