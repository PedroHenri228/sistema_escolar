<?php
include 'config.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $id = $_SESSION['id'];

    $sql = "SELECT *
        FROM turmas
        WHERE nome LIKE '%$search%' AND professor_codigo = '$id'";

    $result = $conn->query($sql);

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
        .navbar-custom {
            background-color: #509342;
        }
    </style>
</head>

<body>
    <?php include ('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Resultado</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <br>
                            <th scope="col">Curso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['codigo'] ?></td>
                                    <td><?php echo $row['nome'] ?></td>
                                    <td> <a href="listar_atividades.php?turma_id=<?php echo $row['codigo'] ?>"
                                            class="btn btn-info btn-sm">Listar Atividades</a> </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" onclick="getID(<?php echo $row['codigo'] ?>)">
                                            Deletar
                                        </button>
                                    </td>
                                    <td> <a href="cadastrar_curso.php?turma_id=<?php echo $row['codigo'] ?>"
                                            class="btn btn-success btn-sm">Cadastrar Curso</a> </td>
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
                                                Realmente deseja deletar a turma: <?php echo $row['nome'] ?> ?

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
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>

    </script>
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