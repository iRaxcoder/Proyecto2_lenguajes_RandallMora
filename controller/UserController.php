<?php


class UserController
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function iniciar_sesion()
    {
        $url = "http://localhost/API_REST_ArtiMax/indexAPI.php";

        $data_array = array(
            'usuario' => $_POST['usuario'],
            'contrasennia' => $_POST['contrasennia']
        );

        $data = http_build_query($data_array);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if ($e = curl_error($ch)) {
            echo $e;
        } else {
            $decoded = json_decode($resp);
            echo $decoded;
        }
        curl_close($ch);
    }

    public function registrar_usuario()
    {
        $url = "http://localhost/API_REST_ArtiMax/indexAPI.php";

        $data_array = array(
            'usuario' => $_POST['usuario2'],
            'edad' => $_POST['edad'],
            'direccion' => $_POST['direccion'],
            'genero' => $_POST['genero'],
            'contrasennia' => $_POST['contrasennia2']
        );

        $data = http_build_query($data_array);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if ($e = curl_error($ch)) {
            echo $e;
        } else {
            $decoded = json_decode($resp);
            echo $decoded;
        }
        curl_close($ch);
    }
}
