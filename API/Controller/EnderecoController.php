<?php 

namespace API\Controller;

use API\DAO\EnderecoDAO;
use API\Model\CidadeModel;
use API\Model\EnderecoModel;
use Exception;

class EnderecoController extends Controller
{
    public static function teste()
    {
        //var_dump("aaa@@@@");

        $cidades = ['Jaú', 'Bariri', 'Itapuí', 'Dois Córregos'];
        parent::getResponseAsJson($cidades);
    }

    public static function getCepByLogradouro() : void
    {
        try
        {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);

            parent::getResponseAsJson($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionASJSON($e);
        }
    }

    public static function getLogradouroByBairroAndCidade() : void
    {
        try
        {
            $bairro = parent::getStringFromUrl(isset($_GET['bairro']) ? $_GET['bairro'] : null, 'bairro');

            $id_cidade = parent::getStringFromUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null, 'cep');

            $model = new EnderecoModel();

            $model->getLogradouroByBairroAndCidade($bairro, $id_cidade);

            parent::getResponseAsJson($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getBairrosByIdCidade()
    {
        try
        {
            $id_cidade = parent::getIntFromUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null);

            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($id_cidade);

            parent::getResponseAsJson($model->rows);

        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function GetCidadesByUF()
    {
        try
        {
            $uf = $_GET['uf'];

            $model = new CidadeModel();
            $model->GetCidadesByUF($uf);

            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }


    
}
