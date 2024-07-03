<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
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
            <div class="col ">
                <?php
                session_start();
                include 'config.php';

                if (!isset($_SESSION['admin_id'])) {
                    header("Location: admin.php");
                }

                $professor_id = $_GET['professor_id'];

                $sql = "SELECT * FROM Turmas WHERE professor_codigo = '$professor_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="alert alert-danger text-center" role="alert">
                    VOCÊ NÃO PODE EXCLUIR UM PROFESSOR COM TURMAS CADASTRADAS!
                    </div>';
                } else {
                    $sql = "DELETE FROM professores WHERE codigo='$professor_id'";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: pagina_admin.php");
                    } else {
                        echo "Erro ao deletar turma: " . $conn->error;
                    }
                }
                ?>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="pagina_admin.php" class="btn btn-primary mb-2">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>