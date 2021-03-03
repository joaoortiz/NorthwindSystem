<?php
if (!isset($_GET['HTML_categoria'])) {
    $cat = 0;
} else {
    $cat = (int) $_GET['HTML_categoria'];
}

$rsLista = listarProdutos($vConn, $cat);
$rsCat = listarCategorias($vConn);
?>
<br>
<img src="img/b<?= $tabela ?>.jpg" class="img-fluid">
<hr>
<form action="Painel.php" method="GET">
<div class="row justify-content-md-center">
    <div class="col-lg-4 text-center">
        

            <select name="HTML_categoria" class="form-control">
                <option selected>Selecione uma categoria...</option>
<?php
while ($dadosCat = mysqli_fetch_array($rsCat)) {
    ?>

                    <option value="<?= $dadosCat['CategoryID'] ?>"><?= $dadosCat['CategoryName'] ?></option>

    <?php
}
?>
            </select>
    </div>
    <div class="col-lg-2 text-center">
        <input type="hidden" name="idPg" value="50">
        <button type="submit" class="btn btn-dark"><i class= "fa fa-lg fa-search"></i> Pesquisar</button>
    </div>
    
    <div class="col-lg-3 text-center">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#FormPrecos">
            <i class="fa fa-lg fa-dollar"></i> 
          Reajuste em massa
        </a>
    </div>
</div>
    </form>
<hr>

<a href="?idPg=<?= $idPg + 2; ?>&acao=1" class="float-right">
    <i class="fa fa-md fa-plus-square"></i>
    Adicionar Novo
</a>
<br>
<table class="table table-striped" align="center" width="100%">

    <thead class="table-dark">
        <tr>
            <th class="TopoTabela"><center>ID</center></th>
<th class="TopoTabela"><center>Name</center></th>            
<th class="TopoTabela"><center>Categoria</center></th>
<th class="TopoTabela"><center>Unidades</center></th>                    
<th class="TopoTabela"><center>Fornecedor</center></th>                    
<th class="TopoTabela"><center>Preço Unitário</center></th>                    
<th colspan="2" class="TopoTabela">Ações</th>
</tr>
</thead>

<tbody>
<?php
while ($dadosLista = mysqli_fetch_array($rsLista)) {
    ?>   
        <tr>
            <td bgcolor="" align="center">
                <a href="?idPg=<?= $idPg + 1; ?>&idReg=<?= $dadosLista['ProductID']; ?>">
                    <font class="LinkDados"><?= $dadosLista['ProductID']; ?>
                </a>
            </td>
            
            <td bgcolor="" align="center">
                <a href="?idPg=<?= $idPg + 1; ?>&idReg=<?= $dadosLista['ProductID']; ?>">
                    <font class="LinkDados"><?= $dadosLista['ProductName']; ?>
                </a>
            </td>
            
            <td align="center"><font class="TextoDados"><?= $dadosLista['CategoryName']; ?></font></td>                        
            <td align="center"><font class="TextoDados"><?= $dadosLista['UnitsInStock']; ?></font></td>            
            <td align="center"><font class="TextoDados"><?= $dadosLista['CompanyName']; ?></font></td>            
            <td align="center"><font class="TextoDados"><?= number_format($dadosLista['UnitPrice'], 2); ?></font></td>            



            <td align="center">
                <a href="?idPg=<?= $idPg + 2 ?>&acao=2&id=<?= $dadosLista['ProductID'] ?>">
                    <i class="fa fa-edit fa-sm"></i>
                </a>
            </td>
            <td align="center">
                <a href="?idPg=<?= $idPg + 9 ?>&conf=0&id=<?= $dadosLista['ProductID'] ?>">
                    <i class="fa fa-trash fa-sm" style="color:red;"></i>
                </a>
            </td>

        </tr>

    <?php
}//fechando while
?>
</tbody>

</table>



<div class="modal fade" id="FormPrecos" tabindex="-1" role="dialog" aria-hidden="true">
    
    
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-body">

                        <img src="img/b<?= $tabela ?>.jpg" class="img-fluid">
<hr>
                        
                        <form class="form" action="AjustarValores.php" method="POST">
                            <center>

                               <div class="row LinhaForm">
                                    <div class="col">
                                        <label>Percentual de Reajuste:</label>
                                        <input type="number" class="form-control" name="HTML_valor" value="5" min="5" max="100" step="5">                                    
                                    </div>                                    
                                </div>
                               <div class="row LinhaForm">
                                <div class="col">
                                    <button type="submit" class="btn btn-danger float-right">
                                        <i class="fa fa-lg fa-dollar"></i>
                                        Aplicar Reajuste
                                    </button>
                                </div>
                            </div>

                            </center>

                        </form>

                    </div>
                </div>
            </div>
        </div>
