<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

//define o nome da sessão pelo id do professor
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];

$sql = "SELECT * FROM Turmas WHERE professor_codigo='$id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listar Turmas</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #509342;
        }
    </style>
</head>

<body>

    <?php include ('navbar.php'); ?>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-end">
            <div class="col-2">
                <a href="cadastrar_turma.php" class="btn btn-success mb-2">Cadastrar Turmas</a>
            </div>
        </div>
        <h4>Turmas: </h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <form class="d-flex" role="search" action="pesquisa_turma.php" method="post">
                            <input class="form-control me-2" name="search" type="search"
                                placeholder="Pesquisar Turmas..." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </th>
                </tr>
                <tr>
                    <th>Número</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>

                        <tr>
                            <td><?php echo $row['codigo'] ?></td>
                            <td><?php echo $row['nome'] ?></td>
                            <td><a href='listar_atividades.php?turma_id=<?php echo $row['codigo'] ?>'
                                    class='btn btn-info btn-sm text-white'>Ver Atividades</a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="getID(<?php echo $row['codigo'] ?>)">
                                    Deletar
                                </button>
                            </td>
                            <td><a href='cadastrar_curso.php?turma_id=<?php echo $row['codigo'] ?>'
                                    class='btn btn-success btn-sm'>Cadastrar Curso</a></td>
                        </tr>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar turma</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Realmente deseja deletar a turma: <?php  echo $row['nome'] ?> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" onclick="excluir()">Deletar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php else: ?>
                    <?php echo "<tr><td colspan='3'>Nenhuma turma cadastrada</td></tr>"; ?>

                <?php endif; ?>
            </tbody>

            <?php include ('cursos.php'); ?>

        </table>
    </div>
    <script src="js/bootstrap.js"></script>
    <script>
        let idSelecionado;
        function getID(id) {
            idSelecionado = id;
        }
        function excluir() {
            window.location.href = "deletar_turma.php?turma_id=" + idSelecionado;
        }

    </script>
</body>

</html>