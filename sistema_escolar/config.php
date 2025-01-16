<?php
    // config.php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "escola_bd";

    // Criando Configuração
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Conferindo a Configuração
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!$conn->set_charset("utf8mb4")) {
        printf("Erro ao definir charset: %s\n", $conn->error);
    }



?>