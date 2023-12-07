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
            alert('Saldo insuficiente!'); 
            window.location.href = 'http://localhost/pix/enviar.php';
        </script>";
        die();      
    }

    $sql2 = "update conta set saldo = saldo - '" . $valor . "' where idConta = 1";

    if (mysqli_query($conn,$sql2)) {
        echo "<script>
                alert('Pix realizado com sucesso!');
                sleep(2);
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }

    $sql3 = "insert into extrato values('Pix', '" . $valor . "')"; 
    if (mysqli_query($conn,$sql3)) {
        echo "<script>
                window.location.href = 'http://localhost/pix/enviar.php'
            </script>";
    } else {
        echo "<script>
                alert('Erro!');
            </script>";
    }

?>