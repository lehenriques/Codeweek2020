<?php
include "include/conexao.include.php"; 

$id         = (int)$_POST["id"];
$titulo     = htmlspecialchars(trim($_POST["titulo"]), ENT_QUOTES,'UTF-8');
$detalhes   = htmlspecialchars(trim($_POST["detalhes"]), ENT_QUOTES,'UTF-8');
$prioridade = htmlspecialchars(trim($_POST["prioridade"]), ENT_QUOTES,'UTF-8');
$vencimento = $_POST["vencimento"];
$finalizado = (int)$_POST["finalizado"];

$sql = "UPDATE tarefas SET titulo = '$titulo', detalhes = '$detalhes', prioridade = '$prioridade', vencimento = '$vencimento', finalizado = '$finalizado' WHERE id = $id";

if (mysqli_query($mysqli, $sql) === TRUE) {
    $_SESSION["MSG"] = '<div class="alert alert-success" role="alert">Seus dados foram salvos com sucesso!</div>';
    header('Location: cadastrar.php');
} else {
    $_SESSION["MSG"] = '<div class="alert alert-danger" role="alert">Ocorreu um erro ao salvar tente novamente mais tarde!</div>';
    header('Location: cadastrar.php');
}
