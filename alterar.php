<?php
    require('conexao.php');
    $id = $_GET['id'];
    $query = "SELECT `titulo`, `descricao`, `data_criacao` FROM `tarefa` WHERE `id`=$id";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) == 1) {
        $linha = mysqli_fetch_assoc($result);
        $titulo = $linha['titulo'];
        $descricao = $linha['descricao'];
    }

    //escutar clique do botão alterar
    if (isset($_POST['alterar'])) {
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        $query = "UPDATE `tarefa` SET `titulo`='$titulo',`descricao`='$descricao' WHERE `id`='$id'";
        $result = mysqli_query($conexao, $query);

        //enviar mensagem de resposta
        $_SESSION['tipo_msg'] = 'info';
        $_SESSION['msg'] = 'Tarefa atualizada com sucesso!!!';

        header("location: index.php");
    }
?>

<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
<body> -->

    <?php include('includes/header.php') ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                        <form action="alterar.php?id=<?php echo $_GET['id']?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" value="<?php echo $id?>" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="titulo" placeholder="Título" value="<?php echo $titulo?>">
                            </div>
                            <div class="form-group">
                                <textarea name="descricao" class="form-control" cols="30" rows="10" placeholder="Descrição"><?php echo $descricao?></textarea>
                            </div>
                            <input type="submit" value="Alterar" name="alterar" class="btn btn-block btn-secondary">
                        </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php') ?>

