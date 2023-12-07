<?php
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
    
    $nome = $_POST['nome'];
    $chave = $_POST['tipo-chave-input'];

    $sql = "insert into pix values('NULL', '" . $nome . "', '" . $chave . "')";

    if (mysqli_query($conn,$sql)) {
        echo "<script>
                alert('Chave cadastrada com sucesso!');
                window.location.href = 'http://localhost/pix/cadastrar.php'
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }
?>