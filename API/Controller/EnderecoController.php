<?php 

namespace API\Controller;

include 'Controller.php';

class EnderecoController extends Controller
{
    public static function teste()
    {
        //var_dump("aaa@@@@");

        $cidades = ['Jaú', 'Bariri', 'Itapuí', 'Dois Córregos'];
        parent::getResponseAsJson($cidades);
    }
}