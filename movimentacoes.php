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
        <!-- lado esquerdo -->
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

        <!-- lado direito -->
        <div class="main-content container">
            <h1 class="title font-5">extrato</h1>

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
    echo "<div class='extrato-container'>";
    echo "<table class='extrato-table'>";
    echo "<tr><th>transação</th><th>valor</th></tr>";

    while($linha = mysqli_fetch_array($tabela)){
        echo "<td>";
        echo $linha["tipoTransacao"] ;
        echo "</td>";
    
        echo "<td>";
        echo 'R$' . $linha["valor"];
        echo "</td></tr>";
    }

    echo "</table>";
    echo"</<div>";
?>
    </div> 
    </main>

    <footer class="footer container font-1">
        <p>Todos os direitos reservados ©</p>
    </footer>
    <script src="/assets/js/script.js"></script>
    <script>
        const tableContainer = document.querySelector(".extrato-container");
        tableContainer.style.margin = '30px auto'
        tableContainer.style.border = '2px solid #000';
        tableContainer.style.border = '2px solid #000';
        tableContainer.style.fontFamily = 'Inconsolata';
        tableContainer.style.padding = '12px';
        const table = document.querySelector(".extrato-table");
        table.style.padding = '0px 24px';
        

    </script>
</body>
</html>