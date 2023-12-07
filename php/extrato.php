<?php
    // Conectando com o banco
    $serverName = "localhost";
    $database = "trabalho-final";
    $userName = "root";
    $password = "";
    $conn= mysqli_connect($serverName,$userName, $password, $database);
    if (!$conn) {
        die("Erro na conexão do DB " . mysqli_connect_error());
        echo "ERRO!";
    }
    // 

    $sql = "select tipoTransacao, valor from extrato";
    $tabela = mysqli_query($conn,$sql) or die(mysql_error($conn));
    echo "<div id= 'dashboard'>";
    echo "<h1>Extrato</h1>";
    echo "<table>";
    echo "<tr><th>TIPO DE TRANSAÇÃO</th><th>VALOR</th></tr>";
    while($linha = mysqli_fetch_array($tabela)){
    echo "<td>";
    echo $linha["tipo"] ;
    echo "</td>";
    
    echo "<td>";
    echo 'R$    ' . $linha["valor"] ;
    echo "</td></tr>";
    }
    echo "</table>";
    echo"</<div>";
?>