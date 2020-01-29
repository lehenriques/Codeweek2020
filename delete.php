<?php
include "include/conexao.include.php"; 

$id = (int)$_GET["codigo"];

$sql = "DELETE FROM tarefas WHERE id = $id";

if (mysqli_query($mysqli, $sql) === TRUE) {
    $_SESSION["MSG"] = '<div class="alert alert-success" role="alert">Seus dados foram deletados com sucesso!</div>';
    header('Location: lista.php');
} else {
    $_SESSION["MSG"] = '<div class="alert alert-danger" role="alert">Ocorreu um erro ao deletar tente novamente mais tarde!</div>';
    header('Location: lista.php');
}
