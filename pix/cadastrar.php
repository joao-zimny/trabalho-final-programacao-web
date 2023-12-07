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
            <h1 class="title font-5">cadastrar chave pix</h1>
            <div class="pix-cadastrar font-6">
                <form action="/php/cadastrarPix.php" method="post" class="form-cadastrar-pix font-3">
                    <label for="chave">chave:</label>
                        <div class="tipo-chave">
                            <select name="tipo-chave" id="tipo-chave" class="font-2">
                                <option value="cpf" class="font-2">CPF</option>
                                <option value="telefone" class="font-2">telefone</option>
                            </select>
                            <input type="text" id="tipo-chave-input" class="font-2" name="tipo-chave-input">
                        </div>
                        <label for="nome">nome:</label>
                        <input type="text" class="font-2" id="nome" name="nome">
                    <button type="submit" onclick="return validarPix()">cadastrar</button>
                </form>
                
            </div>
        </div>
    </main>

    <footer class="footer container font-1">
        <p>Todos os direitos reservados ©</p>
    </footer>
    <script src="/assets/js/script.js"></script>
</body>
</html>