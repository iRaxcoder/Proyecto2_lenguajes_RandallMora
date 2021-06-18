<?php


class HTTPOP
{
    public function __construct()
    {
    }


    public static function METODO_POST($data_array)
    {
        $url = "http://localhost/API_REST_ArtiMax/indexAPI.php";

        $data = http_build_query($data_array);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        $decoded = json_decode($resp, true);

        curl_close($ch);

        return $decoded;
    }

    public static function METODO_GET()
    {
        $url = "http://localhost/API_REST_ArtiMax/indexAPI.php";


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if ($e = curl_error($ch)) {
            echo $e;
        } else {
            return json_decode($resp, true);
        }
        curl_close($ch);
    }

    public static function METODO_GET_PERS($tipo)
    {
        $respuesta = file_get_contents("http://localhost/API_REST_ArtiMax/indexAPI.php?solicitud=" . $tipo);
        return json_decode($respuesta, true);
    }

    public static function METODO_PUT($data_array)
    {
        $url = "http://localhost/API_REST_ArtiMax/indexAPI.php";

        $data = http_build_query($data_array);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        $decoded = json_decode($resp, true);

        curl_close($ch);

        return $decoded;
    }
}
