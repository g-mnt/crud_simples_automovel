<?php

    require "Controllers/AutomovelController.php";
    $automovelController = new AutomovelController;

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['editar'])){
            $automovelController->index(true, $_GET['AutomovelId']);
        }else if(isset($_GET['excluir'])){
            $automovelController->excluirAutomovel($_GET['AutomovelId']);
        }else if(isset($_GET['emitirPDF'])){
            $automovelController->emitirPDFTabela();
        }else{
            $automovelController->index();
        }
        
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['edit'])){
            $automovelController->editarAutomovel($_REQUEST);
        }else{
            $automovelController->cadastrarAutomovel($_REQUEST);
        }        
    }

?>
