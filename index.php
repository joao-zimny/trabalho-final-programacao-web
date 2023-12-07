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

$sql = "select saldo from conta where idConta = 1";  
$result = $conn->query($sql);
if (!$result) {
    die("Erro na consulta: " . $conn->error); 
}
$row = $result->fetch_assoc();
$saldo = $row['saldo'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Banco WEB</title>
</head>

<body>
    <header class="header container font-1">
        <nav class="nav-menu">
            <a href="/index.php">Home</a>
            <a href="/creditos.php">créditos</a>
        </nav>
    </header>
    <main class="main container">
        <div class="user-profile">
            <div class="icon-title">
                <img src="/assets/media/icon.svg">
                <h1 class="font-2">usuário</h1>
            </div>
            <div id="diviser"></div>

            <div class="balance-button">
                <span class="font-4">Saldo: R$
                    <?php echo $saldo; ?>
                </span>
            </div>

            <div class="nav-opt font-2">
                <ul>
                    <li><a href="/conta.php">conta</a></li>
                    <li><a href="/movimentacoes.php">movimentações</a></li>
                    <li><a href="/pix.php">pix</a></li>
                </ul>
            </div>

            <div class="logout-button">
                <span class="font-4">Sair</span>
            </div>
        </div>

        <div class="main-content container" id="index">
            <h1 class="font-1 titulo-principal">Bem vindo!</h1>
        </div>
    </main>

    <footer class="footer container font-1">
        <p>Todos os direitos reservados ©</p>
    </footer>
    <script>
        const dom = document.querySelector('body');
        console.log(dom);
    </script>
    <script src="/assets/js/script.js"></script>
</body>

</html>
?>