<?php 
include 'config.php';
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('location: admin.php');
}

$admin_id = $_GET['admin_id'];

$sql = "SELECT senha FROM admin WHERE id = '$admin_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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

                    <div class="card-body mb-3">
                        <form method="post" action="update_senha.php">
                            <div class="mb-3">
                                <input type="hidden" name="id" class="form-control" required value="<?php echo  $admin_id; ?>" placeholder="Nome">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label fs-6 ">Senha Atual</label>
                                <input type="password" name="senha" id="senhaInput" class="form-control" required value="<?php echo $senha?>" disabled>
                                <span class="toggle-password" onclick="togglePassword()">Mostrar</span>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="senha" class="form-label fs-6 ">Nova Senha</label>
                                <input type="password" name="senha_nova" class="form-control" id="senha" required>
                                <span class="viewPassword" onclick="verSenha()">Mostrar</span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Redefinir Senha</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script>
        function togglePassword() {
            var senhaInput = document.getElementById("senhaInput");
            var togglePasswordText = document.querySelector(".toggle-password");
            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                togglePasswordText.textContent = "Ocultar";
            } else {
                senhaInput.type = "password";
                togglePasswordText.textContent = "Mostrar";
            }
        }
        function verSenha() {
            var senha = document.getElementById("senha");
            var click = document.querySelector(".viewPassword");
            if (senha.type === "password") {
                senha.type = "text";
                click.textContent = "Ocultar";
            } else {
                senha.type = "password";
                click.textContent = "Mostrar";
            }
        }
    </script>
</body>

</html>
