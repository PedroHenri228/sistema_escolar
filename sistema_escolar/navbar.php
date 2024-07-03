<?php 
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome']
?>

<nav class="navbar navbar-custom">
    <div class="container-fluid">
        
        <!-- Nome do Usuario -->
        <span class="navbar-brand mb-0 h1 text-white" role="button" onclick="window.location.href= 'listar_turmas.php'">Bem-vindo(a), <?php echo $nome; ?></span>                                                
        <!-- Nome do Usuario -->

        <!-- Botao sair -->
        <a href="logout.php" class="btn btn-danger">Sair</a>
        <!-- Botao sair -->
    </div>
</nav>

