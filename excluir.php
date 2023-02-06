<?php

include('conexao.php');

$id = $_GET['id'];

//echo "Código = $id";

$query = "DELETE FROM `tarefa` WHERE tarefa.id = $id";

$result = mysqli_query($conexao, $query);

//enviar mensagem de resposta
$_SESSION['tipo_msg'] = 'danger';
$_SESSION['msg'] = 'Tarefa excluída com sucesso!!!';

header("location: index.php");

?>