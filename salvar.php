<?php

include('conexao.php');

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$query = "INSERT INTO `tarefa`(`titulo`, `descricao`) VALUES ('$titulo','$descricao')";

$result = mysqli_query($conexao, $query);

if (!$result) {
    echo "Erro ao salvar: " . mysqli_error($result);
}

//enviar mensagem de resposta
$_SESSION['tipo_msg'] = 'success';
$_SESSION['msg'] = 'Tarefa salva com sucesso!!!';

header("location: index.php");  

?>