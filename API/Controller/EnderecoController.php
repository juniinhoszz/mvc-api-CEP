<?php 

namespace API\Controller;

use API\Model\CidadeModel;
use API\Model\EnderecoModel;
use Exception;

class EnderecoController extends Controller
{
    
    public static function getLogradouroByCep() : void
    {
        try
        {
            $cep = parent::getIntFromURL((isset($_GET['cep'])) ? $_GET['cep'] : null, 'cep');

            $model = new EnderecoModel();
            $model->getLogradouroByCep($cep);

            parent::setResponseAsJson($model->rows);

            
        }
        catch(Exception $e)
        {
            parent::getExceptionASJSON($e);
        }
    }

    /*     
        localhost:8000/cep/by-logradouro
    */
    public static function getCepByLogradouro(): void
    {
        try {

            $logradouro = $_GET['logradouro'];
            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
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

            parent::setResponseAsJson($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    /*     
        localhost:8000/bairro/by-cidade?id_cidade=4874
    */
    public static function getBairrosByIdCidade(): void
    {
        try {

            $cidade = parent::getIntFromURL($_GET['id_cidade']);
            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($cidade);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
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

            parent::setResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }


    
}
