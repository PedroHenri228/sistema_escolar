<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <style>
        .navbar-custom {
            background-color: #509342;

        .logo rounded{
            width: 15px;
        }    
        }
        
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-1 h4 text-white">SISTEMA DE GESTÃO DE ATIVIDADES</span>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <img src="logo.png" class="logo rounded" alt="logo" width = 50px>
                        </div>
                    </div>
                    
                    <div class="col fs-3 mt-3 d-flex justify-content-center">
                        <p>Bem Vindo</p>
                    </div>

                    <div class="card-body">
                        <form method="post" action="login.php">
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>