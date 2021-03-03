<?php
include "FuncoesDAO.php";
$valor = $_POST['HTML_valor'];

$sqlAjuste = "Update products set unitprice = unitPrice * " . (1+((float)$valor)/100);
mysqli_query($vConn, $sqlAjuste);

echo "<script>alert('Reajuste Aplicado!');</script>";
echo "<script>location.href='Painel.php?idPg=50';</script>";

?>
