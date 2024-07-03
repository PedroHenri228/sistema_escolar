<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            width: 500px;
        }

        .card-header {
            background-color: #f1f1f1;
            color: #ffffff;
        }

        .card-footer {
            background-color: #f1f1f1;
        }
        .navbar-custom {
            background-color: #509342;

        .logo rounded{
            width: 15px;
        }    
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
                        <form method="post" action="admin_login.php">
                            <div class="mb-3">
                                <label for="email" class="form-label fs-6 ">E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label fs-6 ">Senha</label>
                                <input type="password" name="senha" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">ENTRAR</button>
                            </div>
                        </form>
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-center">
                        &copy; 2024
                        <hr class="m-0 p-0">
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>