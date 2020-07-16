<?php

    include_once ("conexao.php");

    $nome = $_POST['nome'];
    $resumo = $_POST['resumo'];
    $detalhes = $_POST['detalhes'];
    $estudio = $_POST['estudio'];
    $titulos = $_POST['titulos'];
    $imagem = $_POST['imagem'];

    $tabela = "GAMES";
    
    // VERIFICA SE TEM UM ARQUIVO DE IMAGEM NO FORMULÁRIO
    if (isset($_FILES['imagem'])) {
        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        $novo_nome = md5(time()).$extensao;
        $diretorio = "../img/";

        // MOVE A IMAGEM DE TEMP PARA A PASTA IMG
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

        // INSERE NO BANCO DE DADOS COM A IMAGEM
        $sql = "INSERT INTO $tabela (NOME, RESUMO, DETALHES, ESTUDIO, TITULOS, IMAGEM) 
        VALUES ('$nome', '$resumo', '$detalhes', '$estudio', '$titulos', '$novo_nome')";
    }
    else {
        // SE NÃO TEM IMAGEM INSERE COMO NULL NO BANCO
        $sql = "INSERT INTO $tabela (NOME, RESUMO, DETALHES, ESTUDIO, TITULOS, IMAGEM) 
        VALUES ('$nome', '$resumo', '$detalhes', '$estudio', '$titulos', NULL)";
    }

    $salvar = mysqli_query($conexao, $sql);

    $linhas = mysqli_affected_rows($conexao);

    if ($linhas > 0) {
        header('Location: games.php');
    }

    if (!$_SESSION['logado']) {
        header('Location: ../pages/login.html');
    }

    mysqli_close($conexao);

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nebula Games - Sobre nós</title>
    <link rel="icon" href="img/logo.png">
    <!-- GOOGLE ICONES -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- GOOGLE FONTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Notable&display=swap" rel="stylesheet">
    <!-- CDN MATERIALIZE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header>

        <div class="navbar-fixed">
            <nav class="nav-wrapper">

            <a href="../index.html"><img class="brand-logo logo hide-on-med-and-down" src="../img/logo.png" alt="logo"></a>

                <ul class="right light">
                    <li class="z-depth-1"><a href="../index.html">Início</a></li>
                    <li class="z-depth-1"><a href="games.php">Games</a></li>
                    <li class="z-depth-1"><a href="../pages/sobre.html">Sobre nós</a></li>
                    <li class="z-depth-1"><a href="../pages/cadastro-de-game.html">Cadastrar o seu game</a></li>
                    <li class="z-depth-1"><a href="../pages/login.html">Fazer Login</a></li>
                    <li class="z-depth-1"><a href="../pages/cadastro-de-usuario.html">Cadastrar-se</a></li>
                </ul>

            </nav>
        </div>

    </header>

    <section class="home block">

        <div class="row container banner">

            <div class="col s8 offset-s2 center">

                <div class="card card-login">

                    <div class="card-title">
                        <p class="strong">Confirmação de Cadastro do Game</p>
                    </div>

                    <div class="card-content">
                        <?php    
                            if (!$linhas > 0) {
                                print "<p>Cadastro NÃO realizado!</p>
                                <p>Tente novamente.</p>";
                            }
                        ?>
                        
                        <br>
                        <br>
                        <a href='games.php' class='buttons btn btn-large waves-effect indigo darken-1'>Games</a>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <footer class="white-text">Site desenvolvido por Bruno Gattai, 2020.</footer>

    <!-- CDN JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
    <!-- CDN MATERIALIZE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        M.AutoInit();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {
                fullWidth: true,
                indicators: true,
                duration: 400
            });
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.parallax');
                var instances = M.Parallax.init(elems, options);
            });
        });
    </script>

</body>

</html>