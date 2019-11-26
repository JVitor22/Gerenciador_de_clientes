<?php
namespace Source\Models;

include __DIR__ . '/../vendor/autoload.php';
class Usuarios {
    public function login($login , $password ){
        $sql = ('SELECT id FROM usuarios WHERE login = :l AND senha = :p');
        $conn = Connection::prepare($sql);
        $conn->bindValue(':l' , $login);
        $conn->bindValue(':p' , $password);
        $conn->execute();

        if($conn->rowCount() > 0){
            $data = $conn->fetch();
            session_start();
            $_SESSION['id'] = $data['id'];
            return true; 

        }else{
            die();
            return false;
        }


    }


}