<?php

    $database = "id14258714_nebula_games";
    $hostname = "localhost";
    $user = "id14258714_bruno";
    $password = "x?8Wuqd42y6S4yPP";
    $conexao = mysqli_connect($hostname, $user, $password, $database);

    if (!$conexao) {
        print "Falha na conexão com o Banco de Dados!";
    }

?>