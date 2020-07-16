<?php

include_once("conexao.php");

$tabela = "GAMES";

$sql = "SELECT * FROM $tabela";

$query = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nebula Games - Games de outros estúdios</title>
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
                    <li class="z-depth-1"><a href="../pages/sobre.html">Sobre nós</a></li>
                    <li class="z-depth-1"><a href="../pages/cadastro-de-game.html">Cadastrar o seu game</a></li>
                    <li class="z-depth-1"><a href="../pages/login.html">Fazer Login</a></li>
                    <li class="z-depth-1"><a href="../pages/cadastro-de-usuario.html">Cadastrar-se</a></li>
                </ul>

            </nav>
        </div>

    </header>

    <!-- SHOWCASE -->
    <section class="row">

        <div class="col s12 center">

            <!-- CARDS -->
            <h1 class="white-text flow-text title">Títulos de outros estúdios</h1>

            <!-- ITERAR SOBRE TODOS OS GAMES NA TABELA -->
            <?php while ($dados = $query->fetch_array()) { ?>
                <div class="card col s10 offset-s1 z-depth-4 hoverable">
                    <div class="card-image">
                        <a href="">
                            <img src="../img/<?php echo $dados["IMAGEM"]; ?>">
                        </a>
                        <span class="card-title bg"><?php echo $dados["ESTUDIO"]; ?> - <?php echo $dados["NOME"]; ?></span>
                    </div>
                    <div class="card-content">

                        <p><?php echo $dados["RESUMO"]; ?></p>

                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header">
                                    <i class="material-icons red-text text-darken-4">
                                        games
                                    </i>
                                    Saiba mais sobre o game
                                </div>
                                <div class="collapsible-body">
                                    <span>
                                        <?php echo $dados["DETALHES"]; ?>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header">
                                    <i class="material-icons red-text text-darken-4">
                                        group_work
                                    </i>
                                    Outros games desse estúdio
                                </div>
                                <div class="collapsible-body">
                                    <span>
                                        <?php echo $dados["TITULOS"]; ?>
                                    </span>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>

                <!-- FIM DA ITERAÇÃO DOS GAMES NA TABELA -->
            <?php } ?>

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