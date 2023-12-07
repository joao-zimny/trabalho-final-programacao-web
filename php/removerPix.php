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

    $id = $_POST['idPix'];

    // Criar a query de remoção
    $sql = "delete from pix where pixId ='" . $id . "'";

    // Executar a query
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>
                alert('Chave removida com sucesso!');
                window.location.href = 'http://localhost/pix/favoritas.php'
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }
?>