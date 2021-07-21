<?php
$acao = $_GET['acao'];

$dadosForm = array("","","","","","","","","","","","");
$textoBotao = "Cadastrar Fornecedor";
$destino = "CadastroDados.php";
$tituloForm = "Cadastro";

if($acao == 2){
    $idForn = $_GET['id'];
    $rsDados = consultarPorFornecedor($vConn, $idForn);
    
    $tblDados = mysqli_fetch_array($rsDados);
    
    for($i=0;$i<count($dadosForm); $i++){
        $dadosForm[$i] = $tblDados[$i];
    }    
    
    $textoBotao = "Alterar Dados";
    $destino = "AlteraFornecedor.php";
    $tituloForm = "Alteração";
}

?>
<img src="img/bsuppliers.jpg" class="img-fluid" style="margin-top:15px;">
<center>
    <u><h5 style="margin-top:15px;">Formulário de <?=$tituloForm?> de dados de Fornecedores</h5></u>
</center>
<hr>


<form action="<?=$destino?>" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-12">
            <label>Nome da Empresa: </label>
            <input type="text" name="data[1]" class="form-control" maxlength="40" value="<?=$dadosForm[1];?>">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Representante: </label>
            <input type="text" name="data[2]" class="form-control" maxlength="30" value="<?=$dadosForm[2];?>">
        </div>
        <div class="col-lg-4">
            <label>Cargo: </label>
            <input type="text" name="data[3]" class="form-control" maxlength="30" value="<?=$dadosForm[3];?>">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Endereço: </label>
            <input type="text" name="data[4]" class="form-control" maxlength="60" value="<?=$dadosForm[4];?>">
        </div>
        <div class="col-lg-4">
            <label>Cidade: </label>
            <input type="text" name="data[5]" class="form-control" maxlength="15" value="<?=$dadosForm[5];?>">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Estado: </label>
            <input type="text" name="data[6]" class="form-control" maxlength="15" value="<?=$dadosForm[6];?>">
        </div>
        <div class="col-lg-4">
            <label>País: </label>
            <input type="text" name="data[7]" class="form-control" maxlength="15" value="<?=$dadosForm[8];?>">
        </div>
        <div class="col-lg-4">
            <label>CEP: </label>
            <input type="text" name="data[8]" class="form-control" maxlength="10" value="<?=$dadosForm[7];?>">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Telefone: </label>
            <input type="text" name="data[9]" class="form-control" maxlength="24" value="<?=$dadosForm[9];?>">
        </div>
        <div class="col-lg-6">
            <label>E-mail: </label>
            <input type="text" name="data[10]" class="form-control" maxlength="24" value="<?=$dadosForm[10];?>">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-12">
            <label>WebSite: </label>
            <input type="text" name="data[11]" class="form-control" maxlength="24" value="<?=$dadosForm[11];?>">
        </div>
        
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-12">  
                <input type="hidden" name="data[0]" value="<?=$dadosForm[0];?>">
                <input type="hidden" name="tabela" value="suppliers">
                <button type="submit" class="btn btn-dark float-right"><?=$textoBotao?></button>            
        </div>
    </div>
    
</form>

