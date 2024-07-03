<?php
include 'config.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];

    $sql = "SELECT curso.nomeCurso, turmas.nome
    FROM curso
    INNER JOIN turmas ON curso.turma_codigo = turmas.codigo
    WHERE curso.nomeCurso LIKE '%$search%'";
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
    <div class="container mt-3">
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
                                    <td><?php echo $row['nomeCurso'] ?></td>
                                    <td><?php echo $row['nome'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>