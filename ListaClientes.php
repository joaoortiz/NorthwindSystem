
<?php
if (!isset($_GET['letra'])) {
    $letra = "%";
} else {
    $letra = $_GET['letra'];
}

$rsLista = listarClientes($vConn, $letra);
?>
<br>
<img src="img/b<?= $tabela ?>.jpg" class="img-fluid">
<hr>
<div class="row">
    <div class="col-lg-12 text-center">
<?php for ($i = 65; $i < 91; $i++) { ?>
            <a href="?idPg=10&letra=<?= chr($i); ?>" style="padding-left: 25px;"><?= chr($i); ?></a>
            <?php
        }
        ?>
    </div>
</div>
<hr>


<a href="?idPg=<?= $idPg + 2; ?>&acao=1" class="float-right">
    <i class="fa fa-md fa-plus-square"></i>
    Adicionar Novo
</a>
<br>
<table class="table table-striped" align="center" width="100%">

    <thead class="table-dark">
        <tr>
            <th class="TopoTabela"><center>Customer ID</center></th>
<th class="TopoTabela"><center>Company Name</center></th>
<th class="TopoTabela"><center>Contact Name</center></th>
<th class="TopoTabela"><center>City</center></th>
<th class="TopoTabela"><center>Country</center></th>
<th class="TopoTabela"><center>Phone</center></th>                    
<th colspan="2" class="TopoTabela">Ações</th>
</tr>
</thead>

<tbody>
<?php
while ($dadosLista = mysqli_fetch_array($rsLista)) {
    ?>   
        <tr>
            <td bgcolor="" align="center">
                <a href="?idPg=<?= $idPg + 1; ?>&idReg=<?= $dadosLista['CustomerID']; ?>">
                    <font class="LinkDados"><?= $dadosLista['CustomerID']; ?>
                </a>
            </td>

    <?php
    if ($dadosLista['Status'] == 0)
        $cor = "text-danger";
    else
        $cor = "";
    
    ?>


    <td align = "center"><font class = "TextoDados <?=$cor?>"><?=$dadosLista['CompanyName'];?></font></td>            
            <td align="center"><font class="TextoDados <?=$cor?>"><?= $dadosLista['ContactName']; ?></font></td>            
            <td align="center"><font class="TextoDados <?=$cor?>"><?= $dadosLista['City']; ?></font></td>            
            <td align="center"><font class="TextoDados <?=$cor?>"><?= $dadosLista['Country']; ?></font></td>            
            <td align="center"><font class="TextoDados <?=$cor?>"><?= $dadosLista['Phone']; ?></font></td>            



            <td align="center">
                <a href="?idPg=<?= $idPg + 2 ?>&acao=2&id=<?= $dadosLista['CustomerID'] ?>">
                    <i class="fa fa-edit fa-sm"></i>
                </a>
            </td>
            <td align="center">
                <a href="?idPg=<?= $idPg + 9 ?>&conf=0&id=<?= $dadosLista['CustomerID'] ?>">
                    <i class="fa fa-trash fa-sm" style="color:red;"></i>
                </a>
            </td>

        </tr>

    <?php
}//fechando while
?>
</tbody>

</table>


