<?php
$idCli = $_GET['id'];
$conf = $_GET['conf'];


if($conf == 0){

$rsCliente = consultarCliente($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado
$tblCliente = mysqli_fetch_array($rsCliente); //abrindo o resultset para exibição dos dados


$rsCompras = listarVendas($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado
$totalCompras = contarVendas($vConn, $idCli);
$totalGasto = 0;

while ($tblCompras = mysqli_fetch_array($rsCompras)) {
    $idVenda = $tblCompras['OrderID'];        
    $totalGasto += calcularCompra($vConn, $idVenda);
}

?>

<img src="img/bcustomers.jpg" class="img-fluid" style="margin-top:15px;">
<hr>
<div class="row">
    <div class="col-lg-2">
        <img src="img/user.jpg" class="img-thumbnail">
    </div>

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $tblCliente['CompanyName'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                Representante: <?= $tblCliente['ContactName'] ?><br>
                Cargo: <?= $tblCliente['ContactTitle'] ?><br>
                Telefone: <?= $tblCliente['Phone'] ?><br>
                E-mail: <?= $tblCliente['Fax'] ?><br>
            </div>

            <div class="col-lg-4">
                Endereço: <?= $tblCliente['Address'] ?><br>
                Cidade: <?= $tblCliente['City'] ?><br>
                País: <?= $tblCliente['Country'] ?><br>
                CEP: <?= $tblCliente['PostalCode'] ?><br>

            </div>
            
        </div>
    </div>
    
</div>

<hr>


<div class="row justify-content-md-center">
    <div class="col-lg-4">
        <h4>Compras Efetuadas: <?=$totalCompras?></h4>
    </div>
    <div class="col-lg-4">
        <h4>Compras Efetuadas: U$ <?=number_format($totalGasto,2);?></h4>
    </div>
</div>
<hr>
<center>
<h4>ATENÇÃO: TODAS AS VENDAS SERÃO CLASSIFICADAS COMO INATIVAS.</h4>
<h3> Deseja Excluir o Cliente <font class="text-danger"><?=$idCli?></font> ? </h3>
<p><p>
   
    <a href="?idPg=11&idReg=<?=$idCli?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i> Cancelar Exclusão</a>
    <a href="ExcluiCliente.php?conf=1&id=<?=$idCli;?>" class="btn btn-success"><i class="fa fa-trash fa-lg"></i> Excluir Cliente</a>

</center>
<?php
}else if($conf == 1){
    include "Conexao.php";
    
    //delete
    $sqlExclui = "Update customers set status = 0 where customerID like '$idCli'";
    $sqlVendas = "Update orders set active = 0 where customerID like '$idCli'";
    
    mysqli_query($vConn, $sqlExclui) or die(mysqli_error($vConn));
    mysqli_query($vConn, $sqlVendas) or die(mysqli_error($vConn));
    echo "<script>alert('Cliente Excluído');</script>";
    echo "<script>location.href='Painel.php?idPg=10';</script>";
}else{
    include "Conexao.php";
    
    //delete
    $sqlAtiva = "Update customers set status = 1 where customerID like '$idCli'";
    $sqlVendas = "Update orders set active = 1 where customerID like '$idCli'";
    
    mysqli_query($vConn, $sqlAtiva) or die(mysqli_error($vConn));
    mysqli_query($vConn, $sqlVendas) or die(mysqli_error($vConn));
    echo "<script>alert('Cliente Reativado');</script>";
    echo "<script>location.href='Painel.php?idPg=10';</script>";
}
?>