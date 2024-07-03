<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$turma_id = $_GET['turma_id'];
$id = $_SESSION['id'];

// Obter nome da turma
$sql_turma = "SELECT nome FROM turmas WHERE codigo='$turma_id'";
$result_turma = $conn->query($sql_turma);
$turma_nome = $result_turma->fetch_assoc()['nome'];


$nome =  $_SESSION['nome'];

// Obter Atividades
$sql = "SELECT * FROM atividades WHERE turma_codigo='$turma_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Atividades:</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #509342;
        }
    </style>
</head>
<body>
<?php include('navbar.php');?>
    <div class="container mt-5">
        <h4>Atividades do turma: <?php echo $turma_nome; ?></h4>
        <div class="row justify-content-end">
            <div class="col-3">
            <a href="listar_turmas.php" class="btn btn-primary mb-2">Voltar</a>
            <a href="cadastrar_atividade.php?turma_id=<?php echo $turma_id; ?>" class="btn btn-success mb-2">Cadastrar Atividade</a>
            </div>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['descricao']."</td>";
                        echo "<td>".$row['data']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nenhuma atividade cadastrada</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>