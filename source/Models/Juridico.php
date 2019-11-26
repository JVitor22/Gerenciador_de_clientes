<?php
namespace Source\Models;

class Juridico extends Clientes
{

    private $cnpj;
    private $insc_estadual;

    public function __construct($codigo, $nome, $endereco, $cidade,
        $estado, $email, $tipo, $telefone, $cnpj, $insc_estadual){
        parent::__construct($codigo, $nome, $endereco, $cidade,
        $estado, $email, $tipo, $telefone);
        $this->cnpj = $cnpj;
        $this->insc_estadual = $insc_estadual;
    }
    
    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getInsc_estadual()
    {
        return $this->insc_estadual;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function setInsc_estadual($insc_estadual)
    {
        $this->insc_estadual = $insc_estadual;
    }

    
    
    
}

