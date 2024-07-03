<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome'];
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

<script src="js/bootstrap.js"></script>

<?php include('navbar.php')?>
    <div class="container mt-5">
        <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">TURMA CADASTRADA COM SUCESSO!</div>
                </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
            <a href="listar_turmas.php" class="btn btn-primary mb-2">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>