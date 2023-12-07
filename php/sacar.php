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

    $sql = "select saldo from conta where idConta = 1";  
    $result = $conn->query($sql);
    if (!$result) {
        die("Erro na consulta: " . $conn->error); 
    }
    $row = $result->fetch_assoc();
    $saldo = $row['saldo'];
    if ($valor > $saldo) {
        echo "<script>
            alert('Sem saldo disponivel para sacar!'); 
            window.location.href = 'http://localhost/conta/sacar.php';
        </script>";
        die();
    }

    $sql2 = "update conta set saldo = saldo - '" . $valor . "' where idConta = 1";

    if (mysqli_query($conn,$sql2)) {
        echo "<script>
                alert('Saque efetuado com sucesso!');
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }

    $sql3 = "insert into extrato values('Saque', '" . $valor . "')"; 
    if (mysqli_query($conn,$sql3)) {
        echo "<script>
        window.location.href = 'http://localhost/conta/sacar.php'
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }
?>