<?php

// include_once('config.php');

$serverName = "localhost";
    $database = "trabalho-final";
    $userName = "root";
    $password = "";
    
    $conn= mysqli_connect($serverName,$userName, $password, $database);
    
    if(!$conn){
        die("Erro na conexão do DB " . mysqli_connect_error());
        echo "ERRO!";
    }

$valor = $_POST['valor'];

$sql = "update Conta set saldo = saldo +'" . $valor . "' where idConta = 1";

if (mysqli_query($sql)) {
    echo "erro";
}

?>