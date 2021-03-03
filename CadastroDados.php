<?php

include "Conexao.php";
include "FuncoesDAO.php";

$dadosForm = $_POST['data'];
$qtdeCamposForm = count($dadosForm);

$tabela = $_POST['tabela'];
$campos = "";
$rsCampos = listarCampos($vConn, $tabela);
$qtdeCamposBD = mysqli_num_rows($rsCampos);

$valores = "";

//montando campos na string SQL
$cont = 1;
if ($tabela == "employees") {
    while ($tblCampos = mysqli_fetch_array($rsCampos)) {
        if ($cont < 13)
            $campos .= $tblCampos[0] . ", ";
        else if ($cont == 13)
            $campos .= $tblCampos[0];

        $cont++;
    }
    
    for ($i = 0; $i < count($dadosForm); $i++) {
            if ($i < count($dadosForm) - 1)
                $valores .= "'" . $dadosForm[$i] . "', ";
            else
                $valores .= "'" . $dadosForm[$i] . "'";
        }
}else {
    while ($tblCampos = mysqli_fetch_array($rsCampos)) {

        if ($cont < $qtdeCamposBD)
            $campos .= $tblCampos[0] . ", ";
        else
            $campos .= $tblCampos[0];
        $cont++;
    }

    for ($i = 0; $i < count($dadosForm); $i++) {
        if ($i < count($dadosForm) - 1)
            $valores .= "'" . $dadosForm[$i] . "', ";
        else
            $valores .= "'" . $dadosForm[$i] . "',1";
    }
}

//montando valores na String SQL


$sqlCadastra = "Insert into $tabela($campos)values($valores)";
//echo $sqlCadastra;
mysqli_query($vConn, $sqlCadastra) or die(mysqli_error($vConn));  
echo "<script>alert('Registro Cadastrado.');</script>";
echo "<script>location.href='Painel.php';</script>";
?>
