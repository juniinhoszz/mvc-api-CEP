<?php
use API\Controller\{
    EnderecoController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    // http://localhost:8000/endereco/by-cep?cep=17207495 --
    case "/endereco/by-cep":
        EnderecoController::getLogradouroByCep();
    break;

    // http://localhost:8000/cep/by-logradouro?logradouro=Rua%20Vinte%20e%20Quatro%20de%20Fevereiro --OK
    case '/cep/by-logradouro':
        EnderecoController::getCepByLogradouro();
        break;

    //  http://localhost:8000/logradouro/by-bairro?bairro=Centro&id_cidade=4874 --OK
    case '/logradouro/by-bairro':
        EnderecoController::getLogradouroByBairroAndCidade();
        break;

    // http://localhost:8000/cidade/by-uf?uf=SP -- 
    case '/cidade/by-uf':
        EnderecoController::getCidadesByUF();
        break;

    // http://localhost:8000/bairro/by-cidade?id_cidade=4874 --OK
    case '/bairro/by-cidade':
        EnderecoController::getBairrosByIdCidade();
        break;


    //[403] - Servidor recebeu a requisição, indentificou o autor. Porém não autorizou a emissão da resposta.
    default:
        http_response_code(403);
    break;
}