<?php 
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE professores SET nome = '$nome', email = '$email', senha = '$senha' WHERE codigo = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: pagina_admin.php");
    } else {
        echo "Erro ao cadastrar professor: " . $conn->error;
    }
}
    
    
?>