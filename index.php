<?php 
    require("conexao.php") ;
    
    if ((isset($_SESSION['usuario']) == false) and (isset($_SESSION['senha']) == false)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        
        header("location: login.php");  
    }
    $logado = $_SESSION['usuario'];
?>

<?php include("./includes/header.php") ?>

<main class="container p-4">

    <?php
        if (isset($_SESSION['msg'])) { ?>

            <!-- Mensagem a mostrar -->
            <div class="alert alert-<?php echo $_SESSION['tipo_msg']?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

    <?php unset($_SESSION['tipo_msg'], $_SESSION['msg']); } ?>
    <!-- /Fim da mensagem a mostrar -->

    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="salvar.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="titulo" placeholder="Título">
                    </div>
                    <div class="form-group">
                        <textarea name="descricao" class="form-control" cols="30" rows="10"
                            placeholder="Descrição"></textarea>
                    </div>
                    <input type="submit" name="salvar" value="Salvar" class="btn btn-block btn-success">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data de criação</th>
                    <th>Ação</th>
                </tr>

                <?php
                    //conexao
                    $query = "SELECT * FROM `tarefa`";
                    $resultados = mysqli_query($conexao, $query);
                    while ($linha = mysqli_fetch_assoc($resultados)) { ?>
                <tr>
                    <td><?php echo $linha['titulo']; ?></td>
                    <td><?php echo $linha['descricao']; ?></td>
                    <td><?php echo $linha['data_criacao']; ?></td>
                    <td>
                        <a href="alterar.php?id=<?=$linha['id']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>

                        <a href="excluir.php?id=<?=$linha['id']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</main>


<!-- </body>
</html> -->

<?php include("./includes/footer.php") ?>