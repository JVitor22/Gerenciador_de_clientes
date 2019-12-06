<?php

namespace Source\Models;

use Connection;

abstract class Cliente
{
    protected $codigo;
    protected $nome;
    protected $endereco;
    protected $cidade;
    protected $estado;
    protected $email;
    protected $tipo;
    protected $telefone;

    abstract protected function retornarCpf();
    //CONSTRUTOR 
    //  |
    //  v

    protected function __construct($codigo, $nome, $endereco, $cidade, $estado, $email, $tipo, $telefone)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->email = $email;
        $this->tipo = $tipo;
        $this->telefone = $telefone;
    }

    public function imprimir()
    {
        echo "  " . $this->retornarCpf();
    }


    // M�TODOS GET ---------------
    //  |
    //  v


    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }

    // M�TODOS SET ---------------
    //  |
    //  v

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }



  
    // RETORNA NUMERO DE CLIENTES 
    public function numberClients()
    {
        $query = ("SELECT clientes.id_cliente FROM clientes");
        $conn = Connection::prepare($query);
        $conn->execute();
        return $conn->rowCount();
    }
    public function numberInatives(){
        $query = ("SELECT c.id_cliente, c.nome, c.cidade, c.telefone, c.tipo, MAX(v.data_venda) lastbuy FROM vendas v
       LEFT JOIN clientes c
         ON c.id_cliente = v.id_venda_cliente
       GROUP BY
        c.id_cliente,c.nome
       HAVING
         max(v.data_venda) < (DATE_SUB(CURDATE(), INTERVAL 3 MONTH))");
         $conn = Connection::prepare($query);
         $conn->execute();
         return $conn->rowCount();
    }
    public function findInatives()
    {
        $query = ("SELECT c.id_cliente, c.nome, c.cidade, c.telefone, c.tipo, MAX(v.data_venda) lastbuy FROM vendas v
       LEFT JOIN clientes c
         ON c.id_cliente = v.id_venda_cliente
       GROUP BY
        c.id_cliente,c.nome
       HAVING
         max(v.data_venda) < (DATE_SUB(CURDATE(), INTERVAL 3 MONTH))");
         $conn = Connection::prepare($query);
         $conn->execute();
         return $conn->fetchAll();
    }
    public function insert($obj)
    {
        $sql = "INSERT INTO clientes(clientes.nome,clientes.endereco,clientes.cidade,clientes.email,
        clientes.tipo,clientes.telefone) VALUES (:nome , :endereco, :cidade, :email, :tipo, :telefone)";
        $query = Connection::prepare($sql);
        $query->bindValue('nome', $obj->getNome());
        $query->bindValue('endereco', $obj->getEndereco());
        $query->bindValue('cidade', $obj->getCidade());
        $query->bindValue('email', $obj->getEstado());
        $query->bindValue('tipo', $obj->getTipo());
        $query->bindValue('telefone', $obj->getTelefone());
        return $query->execute();
        if (isset($query)) {
            echo "QUERY EXECUTADA";
        }
    }


    public function findAll()
    {
        $query = ("SELECT * FROM clientes ");
        $conn = Connection::prepare($query);
        $conn->execute();
        return $conn->fetchAll();
    }
}

/**/
