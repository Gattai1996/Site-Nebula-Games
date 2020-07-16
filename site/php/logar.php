<?php

include_once("conexao.php");

session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$tabela = "USUARIOS";

$sql = "SELECT ID FROM $tabela WHERE USUARIO = '$usuario' AND SENHA = '$senha'";

$resultado = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

if ($linhas > 0) {
    $dados = mysqli_fetch_array($resultado);
    $_SESSION['logado'] = true;
    header('Location: ../pages/cadastro-de-game.html');
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

        <nav>

            <div class="nav-wrapper z-depth-4">

                <a href="../index.html"><img class="brand-logo logo hide-on-med-and-down" src="../img/logo.png" alt="logo"></a>

                <ul class="right light hide-on-med-and-down">
                    <li><a href="../index.html">Início</a></li>
                    <li><a href="../pages/sobre.html">Sobre nós</a></li>
                    <li><a href="games.php">Games</a></li>
                    <li><a href="../pages/cadastro-de-game.html">Cadastrar game</a></li>
                    <li><a href="../pages/login.html">Fazer Login</a></li>
                    <li><a href="../pages/cadastro-de-usuario.html">Cadastrar-se</a></li>
                </ul>
            </div>

        </nav>
    </header>

    <section class="home block">

        <div class="row container banner">

            <div class="col s8 offset-s2 center">

                <div class="card card-login">

                    <div class="card-title">
                        <p class="strong">Confirmação de Login</p>
                    </div>

                    <div class="card-content">
                        <?php
                        if (!$linhas > 0) {
                            print "<p>Login NÃO realizado!</p>
                                <p>Verifique seu login e tente novamente.</p>
                                <br>
                                <br>
                                <a href='../pages/login.html' class='buttons btn btn-large waves-effect red darken-4'>Fazer Login <i class='material-icons'>send</i></a>";
                        }
                        ?>
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
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {
                fullWidth: true,
                indicators: true,
                duration: 400
            });
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.parallax');
                var instances = M.Parallax.init(elems, options);
            });
        });
    </script>

</body>

</html>