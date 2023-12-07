<?php
$serverName = "localhost";
$database = "trabalho-final";
$userName = "root";
$password = "";

// Conectando com o banco
$conn= mysqli_connect($serverName,$userName, $password, $database);
if (!$conn) {
    die("Erro na conexão do DB " . mysqli_connect_error());
    echo "ERRO!";
}

// Query
$sql = "select nome, chave, pixId from pix";  
$result = $conn->query($sql);
if (!$result) {
    die("Erro na consulta: " . $conn->error); 
}
while ($row = $result->fetch_assoc()) {
    $id = $row["pixId"];
    $nome = $row["nome"];
    $chavePix = $row["chave"];
}
// $resultado = mysqli_query($conn, $sql);
// $chave = mysqli_fetch_assoc($resultado);
// $id = $chave["pixId"];
// $nome = $chave["nome"];
// $chavePix = $chave["chave"];

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
            <h1 class="title font-5">chaves favoritas</h1>
            <div class="remover-pix font-6">
                <ul class="font-2 chaves-cadastradas-lista">
                    <form action="/php/removerPix.php" method="post">
                    <?php 
                    $sql = "select pixId, nome, chave from pix"; // Single query for pix data

                    $result = $conn->query($sql); // Execute once
                    if (!$result) {
                        die("Erro na consulta: " . $conn->error);
                    }

                    // Fetch all rows from the result
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["pixId"];
                        $nome = $row["nome"];
                        $chavePix = $row["chave"];
                        echo "<li>";
                        echo    "<h3>";
                        echo        $nome;
                        echo    "</h3>";
                        echo    "<span> $chavePix </span>";
                        echo    "<input type='text' style='display: none' id='idPix' name='idPix' value='" . $id . "'>";
                        echo    "<input type='submit' style='cursor: pointer' class='remover-pix-botao' id='remover-pix-botao' value='remover'/input>";
                    }
                    ?>
                    </form>
                    
                </ul>
                
            </div>
        </div>
        
        
    </main>

    <footer class="footer container font-1">
        <p>Todos os direitos reservados ©</p>
    </footer>
    <script src="/assets/js/script.js"></script>
</body>
</html>