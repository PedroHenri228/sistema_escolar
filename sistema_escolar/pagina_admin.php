<?php
include 'config.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
    exit();
}

$id = $_SESSION['admin_id'];
$nome = $_SESSION['admin'];

$sql = "SELECT * FROM admin WHERE id='$id'";
$result = $conn->query($sql);



$sql = "SELECT * FROM professores";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .navbar-custom {
            background-color: #509342;

        }

        .dropdown>.btn-custom {
            background-color: #509342;
            color: #ffffff;
        }

        .dropdown-menu {
            background-color: #f1f1f1;
        }

        .dropdown-item {
            color: #509342;
        }

        .bi-person-circle {
            font-size: 2rem;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-1 h4 text-white">SISTEMA DE GESTÃO DE ATIVIDADES - <?php echo $nome ?></span>
            <div class="dropdown dropstart me-5">
                <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle large-icon"></i><br>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="redefinir_senha.php?admin_id=<?php echo $id ?>">Redefinir
                            Senha</a></li>
                    <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="cadastrar_professor.php" class="btn btn-success m-5 ms-0">Cadastrar Professor</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><a href="editar_professor.php?professor_id=<?php echo $row['codigo'] ?>"
                                            class="btn btn-primary">Editar</a></td>
                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" onclick="getID(<?php echo $row['codigo'] ?>)">
                                            Deletar
                                        </button>
                                    </td>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Exclusão de Professores
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Realmente deseja excluir o professor: <?php echo $row['nome'] ?> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="excluir()">Deletar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var idSelecionado
        function getID(id) {
            idSelecionado = id
        }
        function excluir() {
            window.location.href = "deletar_professor.php?professor_id=" + idSelecionado
        }

    </script>
</body>

</html>