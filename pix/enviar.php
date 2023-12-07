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
    <style>
        #lista-enviar-pix {
            height: 90px;
            margin-bottom: 24px;
        }
        #div-enviar-pix {
            margin-top: 40px;
        }
    </style>
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
            <h1 class="title font-5">enviar pix</h1>
            <div class="pix-enviar font-6" id="div-enviar-pix">
                <form action="/php/enviarPix.php" method="post" class="form-enviar-pix font-3">
                    <ul class="font-2 chaves-cadastradas-lista" id="lista-enviar-pix">
                    <!-- <form action="/php/removerPix.php" method="post"> -->
                    <?php 
                    $sql = "select pixId, nome, chave from pix"; // Single query for pix data
                    $result = $conn->query($sql); // Execute once
                    if (!$result) {
                        die("Erro na consulta: " . $conn->error);
                    }
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
                        echo    "<input type='radio' name='escolha-chave' class='remover-pix-botao' id='remover-pix-botao' value='remover'/input>";
                    }
                    ?>
                    </ul>
                    <div>
                        <label for="valor">valor:</label>
                        <input type="text" placeholder="R$" id="valor" name="valor">
                    </div>
                    <button type="submit" onclick="return validarPix()">enviar</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer container font-1">
        <p>Todos os direitos reservados ©</p>
    </footer>
    <script src="/assets/js/script.js"></script>
    <script>
        function validarPix() {
            const campoChave = document.querySelector('input[name="escolha-chave"]:checked');
            const valor = document.getElementById('valor').value;

            if (!campoChave) {
                alert("Selecione uma chave pix!");
                return false;
            }

            if (isNaN(valor)) {
                alert("Digite um valor númerico!");
                return false;
            }

            if (valor === "") {
                alert("Digite algum valor!");
                return false;
            }

            if (+valor <= 0) {
                alert("Digite um valor maior do que R$0!");
                return false;
            }

        }
        
    </script>
</body>
</html>