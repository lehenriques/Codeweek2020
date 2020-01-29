<?php include "include/conexao.include.php"; ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>ToDo App | PHP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <?php include "include/menu.include.phtml"; ?>
    
    <main role="main" class="container mt-5">
        <h1 class="pt-5 pb-3">Cadastrar nova tarefa</h1>
        <?php
        if(isset($_SESSION['MSG']) && !empty($_SESSION['MSG'])){
            echo '<div class="row justify-content-md-center"><div class="col col-lg-4">' . $_SESSION['MSG'] . '</div></div>';
            unset($_SESSION['MSG']);
        }
        ?>
        <div class="row justify-content-md-center">
            <div class="col col-lg-4">
                <form action="insert.php" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="form-group">
                        <label for="detalhes">Detalhes</label>
                        <input type="text" class="form-control" id="detalhes" name="detalhes" >
                    </div>
                    <div class="form-group">
                        <label for="prioridade">Select de exemplo</label>
                        <select class="form-control" id="prioridade" name="prioridade">
                            <option value="baixa">Baixa</option>
                            <option value="regular">Regular</option>
                            <option value="normal">Normal</option>
                            <option value="alta">Alta</option>
                            <option value="urgente">Urgente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vencimento">Data do Vencimento</label>
                        <input type="date" class="form-control" id="vencimento" name="vencimento">
                    </div>
                    <div class="form-check pb-4">
                        <input class="form-check-input" type="checkbox" value="0" id="finalizado" id="finalizado">
                        <label class="form-check-label" for="finalizado">
                            Finalizado
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Botão</button>
                </form> 
            </div>               
        </div>
    </main>

    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>