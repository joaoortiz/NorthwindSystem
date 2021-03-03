<html>

    <head>
        <!-- Cabeçalho: configuração da página -->
        <meta charset="utf-8"> <!--codificação de caracteres-->
        <title>Sistemas Web - 6CIC</title> <!-- String aba do nav -->

        <!-- Referencia ao Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Referencia ao FontAwesome -->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link rel="stylesheet" href="css/estilo.css">

        <script>
            function mostrarItens(linha) {
                //pegando estado atual da DIV selecionada
                var status = document.getElementById(linha).style.display;

                if (status == "block") {
                    document.getElementById(linha).style.display = "none";
                } else {
                    document.getElementById(linha).style.display = "block";
                }
            }
        </script>

    </head>

    <body>

        <?php
        date_default_timezone_set('America/Sao_Paulo');

        session_start();

        include "Seguranca.php";
        include "NavMenu.php";
        ?>
        <div class="container">

            <?php
            include "FuncoesDAO.php";

            if (!isset($_GET['idPg'])) { //se a variavel URL idPg nao existir (monta a home)            
                ?>

                <div class="row" style="margin-top:10px;"> <!--1º LINHA (row) -->

                    <div class="col-lg-4">
                        <div class="card">
                            <img src="img/clientes.jpg" class="card-img-top ImgModulo">
                            <div class="card-body">
                                <table class="table table-sm" align="center">
                                    <thead>
                                        <tr>
                                            <th><font class="TextoDados">Id</font></th>
                                            <th><font class="TextoDados">CompanyName</font></th>
                                            <th><font class="TextoDados">Country</font></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rsDados = listarDadosHome($vConn, 10);
                                        while ($tblDados = mysqli_fetch_array($rsDados)) {
                                            ?>
                                            <tr>
                                                <td><font class="TextoDados"><?= $tblDados[0]; ?></font></td>
                                                <td><font class="TextoDados"><?= substr($tblDados[1], 0, 15); ?>..</font></td>
                                                <td><font class="TextoDados"><?= $tblDados[2]; ?></font></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>                                    
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="Painel.php?idPg=10" class="LinkDados float-right">
                                    Visualizar Clientes
                                </a>                            
                            </div>                        
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <img src="img/funcionarios.jpg" class="card-img-top ImgModulo">
                            <div class="card-body">
                                <table class="table table-sm" align="center">
                                    <thead>
                                        <tr>
                                            <th><font class="TextoDados">Id</font></th>
                                            <th><font class="TextoDados">Name</font></th>                                            
                                            <th><font class="TextoDados">Country</font></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rsDados = listarDadosHome($vConn, 20);
                                        while ($tblDados = mysqli_fetch_array($rsDados)) {
                                            ?>
                                            <tr>
                                                <td><font class="TextoDados"><?= $tblDados[0]; ?></font></td>
                                                <td><font class="TextoDados"><?= $tblDados[1] . " " . $tblDados[2]; ?></font></td>
                                                <td><font class="TextoDados"><?= $tblDados[3]; ?></font></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>                                    
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="Painel.php?idPg=20" class="LinkDados float-right">
                                    Visualizar Funcionários
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <img src="img/fornecedores.jpg" class="card-img-top ImgModulo">
                            <div class="card-body">
                                <table class="table table-sm" align="center">
                                    <thead>
                                        <tr>
                                            <th><font class="TextoDados">Id</font></th>
                                            <th><font class="TextoDados">CompanyName</font></th>
                                            <th><font class="TextoDados">City</font></th>
                                            <th><font class="TextoDados">Country</font></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rsDados = listarDadosHome($vConn, 30);
                                        while ($tblDados = mysqli_fetch_array($rsDados)) {
                                            ?>
                                            <tr>
                                                <td><font class="TextoDados"><?= $tblDados[0]; ?></font></td>
                                                <td><font class="TextoDados"><?= substr($tblDados[1], 0, 10); ?>..</font></td>
                                                <td><font class="TextoDados"><?= $tblDados[2]; ?></font></td>
                                                <td><font class="TextoDados"><?= $tblDados[3]; ?></font></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>                                    
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="Painel.php?idPg=30" class="LinkDados float-right">
                                    Visualizar Fornecedores
                                </a>
                            </div>
                        </div>
                    </div>

                </div>            

                <div class="row" style="margin-top:15px;"> <!--2º LINHA (row) -->

                    <div class="col-lg-4">
                        <div class="card">
                            <img src="img/transportadoras.jpeg" class="card-img-top ImgModulo">
                            <div class="card-body">
                                <table class="table table-sm" align="center">
                                    <thead>
                                        <tr>
                                            <th><font class="TextoDados">Id</font></th>
                                            <th><font class="TextoDados">CompanyName</font></th>
                                            <th><font class="TextoDados">Phone</font></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rsDados = listarDadosHome($vConn, 40);
                                        while ($tblDados = mysqli_fetch_array($rsDados)) {
                                            ?>
                                            <tr>
                                                <td><font class="TextoDados"><?= $tblDados[0]; ?></font></td>
                                                <td><font class="TextoDados"><?= $tblDados[1]; ?>..</font></td>
                                                <td><font class="TextoDados"><?= $tblDados[2]; ?></font></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>                                    
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="Painel.php?idPg=40" class="LinkDados float-right">
                                    Listar Transportadoras
                                </a>                            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <img src="img/produtos.jpg" class="card-img-top ImgModulo">
                            <div class="card-body">
                                <table class="table table-sm" align="center">
                                    <thead>
                                        <tr>
                                            <th><font class="TextoDados">Id</font></th>
                                            <th><font class="TextoDados">ProductName</font></th>
                                            <th><font class="TextoDados">UnitPrice</font></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rsDados = listarDadosHome($vConn, 50);
                                        while ($tblDados = mysqli_fetch_array($rsDados)) {
                                            ?>
                                            <tr>
                                                <td><font class="TextoDados"><?= $tblDados[0]; ?></font></td>
                                                <td><font class="TextoDados"><?= substr($tblDados[1], 0, 15); ?>..</font></td>
                                                <td><font class="TextoDados"><?= $tblDados[2]; ?></font></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>                                    
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="Painel.php?idPg=50" class="LinkDados float-right">
                                    Listar Produtos
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <img src="img/vendas.jpg" class="card-img-top ImgModulo">
                            <div class="card-body">
                                <table class="table table-sm" align="center">
                                    <thead>
                                        <tr>
                                            <th><font class="TextoDados">Id</font></th>
                                            <th><font class="TextoDados">OrderDate</font></th>
                                            <th><font class="TextoDados">CustomerId</font></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rsDados = listarDadosHome($vConn, 60);
                                        while ($tblDados = mysqli_fetch_array($rsDados)) {
                                            ?>
                                            <tr>
                                                <td><font class="TextoDados"><?= $tblDados[0]; ?></font></td>
                                                <td><font class="TextoDados"><?= substr($tblDados[1], 0, 10); ?></font></td>
                                                <td><font class="TextoDados"><?= $tblDados[2]; ?></font></td>                                                
                                            </tr>
                                            <?php
                                        }
                                        ?>                                        
                                    </tbody>                                    
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="Painel.php?idPg=60" class="LinkDados float-right">
                                    Visualizar Vendas
                                </a>
                            </div>
                        </div>
                    </div>

                </div>            
                <?php
            } else { //se a variavel idPg existir
                $idPg = $_GET['idPg'];

                if ($idPg == 10) {
                    //Clientes                    
                    $tabela = "customers";
                    include "ListaClientes.php";
                } else if ($idPg == 11) {
                    include "InfoCliente.php";
                } else if ($idPg == 12) {
                    include "FormCadastroCliente.php";
                } else if ($idPg == 19) {
                    include "ExcluiCliente.php";
                } else if ($idPg == 20) {
                    //Funcionários
                    $tabela = "employees";
                    include "ListaFuncionarios.php";
                } else if ($idPg == 21) {
                    include "InfoFuncionario.php";
                } else if ($idPg == 22) {
                    include "FormCadastroFuncionario.php";
                } else if ($idPg == 30) {
                    //Fornecedores
                    $tabela = "suppliers";
                    include "Lista.php";
                } else if ($idPg == 31) {
                    include "InfoFornecedor.php";
                } else if ($idPg == 32) {
                    include "FormCadastroFornecedor.php";
                } else if ($idPg == 40) {
                    //Transportadoras
                    $tabela = "shippers";
                    include "Lista.php";
                } else if ($idPg == 42) {
                    include "FormCadastroTransportadora.php";
                } else if ($idPg == 50) {
                    //Estoque                    
                    $tabela = "products";
                    include "ListaProdutos.php";
                } else if ($idPg == 51) {
                    include "InfoProduto.php";
                } else if ($idPg == 52) {
                    include "FormCadastroProduto.php";
                } else if ($idPg == 60) {
                    //Vendas
                    $tabela = "orders";
                    include "ListaVendas.php";
                } else if ($idPg == 61) {
                    include "InfoVenda.php";
                } else if ($idPg == 62) {
                    include "FormCadastroVenda.php";
                }
            }//fechando else (!isset)
            ?>

        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    </body>

</html>