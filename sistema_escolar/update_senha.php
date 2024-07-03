<?php 
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $senha_nova = $_POST['senha_nova'];

    
    $sql = "UPDATE admin SET senha = '$senha_nova' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: pagina_admin.php");
    } else {
        echo "Erro ao cadastrar professor: " . $conn->error;
    }
}




?>