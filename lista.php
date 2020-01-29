<?php include "include/conexao.include.php"; ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>ToDo App | PHP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
    <?php include "include/menu.include.phtml"; ?>
    
    <main role="main" class="container mt-5">
        <div class="row justify-content-md-center pt-5 pb-1">
            <div class="col12 col-sm-9">
                <h1 class="">ToDo</h1>
            </div>
            <div class="col-12 col-sm-3">
                <a href="cadastrar.php" class="btn btn-secondary">Nova tarefa</a>
            </div>
        </div>
        <?php
        if(isset($_SESSION['MSG']) && !empty($_SESSION['MSG'])){
            echo '<div class="row justify-content-md-center"><div class="col col-lg-4">' . $_SESSION['MSG'] . '</div></div>';
            unset($_SESSION['MSG']);
        }
        ?>
        <div class="row justify-content-md-center">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Prioridade</th>
                            <th scope="col">Vencimento</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT id, titulo, prioridade, vencimento, finalizado FROM tarefas ORDER BY finalizado ASC, vencimento ASC";
                            if($query = mysqli_query($mysqli, $sql)) {
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<tr>';
                                        echo '<th scope="row">'.$row["id"].'</th>';
                                        echo '<td>'.$row['titulo'].'</td>';
                                        echo '<td>'.ucfirst($row['prioridade']).'</td>';
                                        echo '<td>';
                                        if($row['vencimento'] != '0000-00-00 00:00:00'){
                                            echo date('d/m/Y', strtotime($row['vencimento']));
                                        }else{
                                            echo "Sem data";
                                        }
                                        echo '</td>';
                                        echo '<td>';
                                        if($row['finalizado'] == 0){
                                            echo '<a href="feito.php?codigo='.$row["id"].'&status=1" class="btn btn-success">Marcar como feito</a>';
                                        }else{
                                            echo '<a href="feito.php?codigo='.$row["id"].'&status=0" class="btn btn-warning">Marcar como a fazer</a>';
                                        }
                                        echo ' <a href="delete.php?codigo='.$row["id"].'" class="btn btn-danger">Apagar</a></td>';
                                    echo '</tr>';
                                }
                            }else{
                                echo '<tr>';
                                    echo '<td colspan="5" class="justify-content-md-center">Sem registro no momento</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>               
        </div>
    </main>

    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>