<?php
include 'config.php';
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$sql = "SELECT curso.nomeCurso, turmas.nome
FROM curso
INNER JOIN turmas ON curso.turma_codigo = turmas.codigo";
$result = $conn->query($sql);
?>

            <table class="table table-striped">
                <h4 class="mt-5">Cursos:</h4>
                <thead>
                    <tr>
                        <th scope="col">
                            <form class="d-flex" role="search" action="pesquisa_curso.php" method="post">
                                <input class="form-control me-2" name="search" type="search" placeholder="Pesquisar Cursos..." aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <br>
                        <th scope="col">Cursos</th>
                        <th scope="col">Turmas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td> <?php echo $row['nomeCurso'] ?></td>
                                <td><?php echo $row['nome'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>