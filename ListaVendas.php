<?php
if (!isset($_GET['tipo'])) {
    $tipo = 0;
    $dataIn = "";
    $dataFin = "";
} else {
    $tipo = (int) $_GET['tipo'];
    $dataIn = $_GET['HTML_dataIn'];
    $dataFin = $_GET['HTML_dataFin'];
}

$rsLista = listarOrdens($vConn, $dataIn, $dataFin, $tipo);
?>
<br>
<img src="img/b<?= $tabela ?>.jpg" class="img-fluid">
<hr>
<form action="Painel.php" method="GET">
    <div class="row justify-content-md-center">
        <div class="col-lg-4 text-center"> Data Inicial
            <input type="date" name="HTML_dataIn" class="form-control">
        </div>
        <div class="col-lg-4 text-center">Data Final
            <input type="date" name="HTML_dataFin" class="form-control">
        </div>
        <div class="col-lg-2 text-center">
            <input type="hidden" name="idPg" value="60">
            <input type="hidden" name="tipo" value="1">
            <button type="submit" class="btn btn-dark"  style="margin-top:22px;"><i class= "fa fa-lg fa-search"></i>Filtrar por data</button>
        </div>
    </div>
</form>
<hr>

<a href="?idPg=<?= $idPg + 2; ?>&acao=1" class="float-right">
    <i class="fa fa-md fa-plus-square"></i>
    Nova Venda
</a>
<br>
<table class="table table-striped" align="center" width="100%">

    <thead class="table-dark">
        <tr>
            <th class="TopoTabela"><center>ID</center></th>
<th class="TopoTabela"><center>Cliente</center></th>            
<th class="TopoTabela"><center>Data do Pedido</center></th>
<th class="TopoTabela"><center>Valor Total</center></th>                    

<th colspan="2" align="center" class="TopoTabela">Ações</th>
</tr>
</thead>

<tbody>
    <?php
    while ($dadosLista = mysqli_fetch_array($rsLista)) {
        ?>   
        <tr>
            <td bgcolor="" align="center">
                <a href="?idPg=<?= $idPg + 1; ?>&idReg=<?= $dadosLista['OrderID']; ?>">
                    <font class="LinkDados"><?= $dadosLista['OrderID']; ?>
                </a>
            </td>

            <?php
            $rsVenda = consultarVenda($vConn, $dadosLista['OrderID']);
            $tblVenda = mysqli_fetch_array($rsVenda);
            ?>

            <td align="center"><font class="TextoDados">
                <a href="?idPg=11&idReg=<?=$dadosLista['CustomerID']; ?>">
                    <?= $dadosLista['CustomerID']; ?></font>
                </a></td>            
                <td align="center"><font class="TextoDados"><?= corrigirData($dadosLista['OrderDate']); ?></font></td>                                    
            <td align="center"><font class="TextoDados">U$ <?= number_format(calcularCompra($vConn, $tblVenda['OrderID']), 2) ?></font></td>            



            <td align="center">
                <a href="?idPg=<?= $idPg + 2 ?>&acao=2&id=<?= $dadosLista['OrderID'] ?>">
                    <i class="fa fa-edit fa-sm"></i>
                </a>
            </td>
            <td align="center">
                <a href="?idPg=<?= $idPg + 9 ?>&conf=0&id=<?= $dadosLista['OrderID'] ?>">
                    <i class="fa fa-trash fa-sm" style="color:red;"></i>
                </a>
            </td>

        </tr>

        <?php
    }//fechando while
    ?>
</tbody>

</table>



