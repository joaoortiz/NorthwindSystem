<?php

$rsLista = listarFuncionarios($vConn);

?>
<br>
<img src="img/b<?=$tabela?>.jpg" class="img-fluid">
<hr>


<a href="?idPg=<?=$idPg + 2;?>&acao=1" class="float-right">
    <i class="fa fa-md fa-plus-square"></i>
    Adicionar Novo
</a>
<br>
<table class="table table-striped" align="center" width="100%">

    <thead class="table-dark">
        <tr>
            <th class="TopoTabela"><center>Employee ID</center></th>
            <th class="TopoTabela"><center>Name</center></th>            
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
                    <a href="?idPg=<?=$idPg + 1;?>&idReg=<?=$dadosLista['EmployeeID'];?>">
                        <font class="LinkDados"><?=$dadosLista['EmployeeID'];?>
                    </a>
            </td>
            
            
            <td align="center"><font class="TextoDados"><?=$dadosLista['FirstName']." ".$dadosLista['LastName'];?></font></td>                        
            <td align="center"><font class="TextoDados"><?=$dadosLista['City'];?></font></td>            
            <td align="center"><font class="TextoDados"><?=$dadosLista['Country'];?></font></td>            
            <td align="center"><font class="TextoDados"><?=$dadosLista['HomePhone'];?></font></td>            
            
            
            
            <td align="center">
                <a href="?idPg=<?=$idPg + 2?>&acao=2&id=<?=$dadosLista['EmployeeID']?>">
                    <i class="fa fa-edit fa-sm"></i>
                </a>
            </td>
            <td align="center">
                <a href="?idPg=<?=$idPg + 9?>&conf=0&id=<?=$dadosLista['EmployeeID']?>">
                    <i class="fa fa-trash fa-sm" style="color:red;"></i>
                </a>
            </td>
            
        </tr>

        <?php
        }//fechando while
        ?>
    </tbody>
    
</table>


