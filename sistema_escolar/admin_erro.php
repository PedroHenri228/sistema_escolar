<?php
    session_start(); // INICIANDO SESSÃO
    if (!isset($_SESSION['admin_id'])) { //VERIFICA SE A SESSÃO "admin_id" FOI DEFINIDA
        header("Location: admin.php"); // SE NÃO FOI VOLTA PARA O PÁGINA DE LOGIN
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #509342;
        }
    </style>
</head>
<body>
    <?php include('navbar.php');?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">VOCÊ NÃO PODE EXCLUIR UM PROFESSOR COM TURMAS CADASTRADAS!</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="pagina_admin.php" class="btn btn-primary mb-2">Voltar</a>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>