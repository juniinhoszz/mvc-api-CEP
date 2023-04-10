<?php
namespace API\Model;

use API\DAO\EnderecoDAO;
use Exception;

class CidadeModel extends Model 
{
    public $id_cidade, $descricao, $uf, $codigo_ibge, $ddd;

    public function getCidadesByUf(string $uf) 
    {
        try
        {
            $dao = new EnderecoDAO();

            $this->rows = $dao->selectCidadesByUF($uf);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
}