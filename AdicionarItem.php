<?php
include "Conexao.php";
include "FuncoesDAO.php";
session_start();

$idCli = $_GET['idCli'];
$codProd = $_GET['HTML_produto'];
$qtde = $_GET['HTML_qtde'];

$statusItem = verificaQtde($vConn, $codProd, $qtde);

if($statusItem){
    $_SESSION['itens'].=$codProd."-".$qtde."#";
}else{
    echo "<script>alert('O item selecionado não possui quantidade suficiente em estoque.');</script>";
}

echo "<script>location.href='Painel.php?idPg=62&idCli=$idCli';</script>";

?>