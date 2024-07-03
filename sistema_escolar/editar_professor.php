<?php
include 'config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
}

$professor_id = $_GET['professor_id'];

$sql = "SELECT * FROM professores WHERE codigo = '$professor_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['codigo'];
        $nome = $row["nome"];
        $email = $row["email"];
        $senha = $row["senha"];
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .card {
            width: 500px;
        }

        .card-header {
            background-color: #509342;
            color: #ffffff;
        }

        .card-footer {
            background-color: #509342;
            color: #ffffff;
        }
        .navbar-custom {
            background-color: #509342;

        }
    </style>
</head>

<body>
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-1 h4 text-white">SISTEMA DE GESTÃO DE ATIVIDADES</span>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <img src="logo.png" class="logo rounded" alt="logo" width=50px>
                        </div>
                    </div>

                    <div class="col fs-3 mt-3 d-flex justify-content-center">
                        <p>Bem Vindo</p>
                    </div>

                    <div class="card-body">
                        <form method="post" action="update.php">
                            <div class="mb-3">
                                <input type="hidden" name="id" class="form-control" required value="<?php echo  $id; ?>" placeholder="Nome">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fs-6 ">Nome</label>
                                <input type="text" name="nome" class="form-control" required value="<?php echo  $nome; ?>" placeholder="Nome">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fs-6 ">E-mail</label>
                                <input type="email" name="email" class="form-control" required value="<?php echo $email?>">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label fs-6 ">Senha</label>
                                <input type="password" name="senha" class="form-control" required value="<?php echo $senha?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>
