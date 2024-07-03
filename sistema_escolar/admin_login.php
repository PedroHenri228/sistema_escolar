<?php
session_start(); // INICIANDO SESSÃO
include 'config.php'; // INCLUIDO A CONFIGURAÇÃO DO BANCO DE DADOS


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // VERIFICA SE A REQUISIÇÃO VEM DO MÉTODO POST
    $email = $_POST['email']; // E-MAIL DO ADMINISTRADOR
    $senha = $_POST['senha']; // SENHA DO ADMINISTRADO

    $sql = "SELECT * FROM admin WHERE email='$email' AND senha='$senha'"; // CONSULTO PARA SELECECIONAR O E-MAIL E SENHA DO ADMINISTRADOR
    $result = $conn->query($sql); // VÁRIAVEL PARA ARMAZENAR A CONSULTA  NO BANCO DE DADOS

    if($result->num_rows > 0) { // VERIFICA SE A CONSULTA RETORNOU ALGUM RESULTADO
        $admin = $result->fetch_assoc(); // OBTER LINHA DE RESULTADO
        $_SESSION['admin_id'] = $admin['id']; // ADICIONA A LINHA "id" NA SESSÃO
        $_SESSION['admin'] = $admin['nome']; // ADICIONA A LINHA "nome" NA SESSÃO

        
        header('Location: pagina_admin.php'); // REDIRECIONA PARA A PÁGINA PRINCIPAL

    } else {
        header('Location: admin.php');
    }

}
