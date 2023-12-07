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
    $valor = $_POST['valor'];
    $sql = "update conta set saldo = saldo + '" . $valor . "' where idConta = 1";

    if (mysqli_query($conn,$sql)) {
        echo "<script>
            alert('Depósito efetuado com sucesso!');
            sleep(2);
        </script>";
    } else {
        echo "<script>
        alert('Erro!');
        </script>";
    }

    $sql3 = "insert into extrato values('Depósito', '" . $valor . "')"; 
    if (mysqli_query($conn,$sql3)) {
        echo "<script>
                window.location.href = 'http://localhost/conta/depositar.php'
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }
?>