<?php

include("controller/header.php");

$idexcluir="1";

$arquivos="";

if(isset($logado)){

    if($nivel=="usuario"){

        include("UsuarioLogado.php");

    }else{

    $mostrar= "Logado como $exibicao ";

    }

}

else{

$mostrar= "Logado como $exibicao ";

include("Home.php");

}

?>

<!DOCTYPE html>

<!--

To change this license header, choose License Headers in Project Properties.

To change this template file, choose Tools | Templates

and open the template in the editor.

-->

<html>

    <head>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <meta charset="utf-8">

        <title>Lista de Usuários</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link href="css/bootstrap.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

        <link href="css/bootstrap-social.css" rel="stylesheet" >

        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        
        <link rel="shortcut icon" href="img/speaker.ico" >

    </head>

    <body id="fundo">

        

        <div class="navbar-wrapper">

        <div class="container">

          <div class="navbar navbar-inverse navbar-static-top">

              <div class="navbar-header">

                  <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                  </a>

              </div>

              <div class="navbar-collapse collapse" style="width: 1100px; height: 333px;">

                <ul class="nav navbar-nav">

                    <li><a href="index.php">Home</a></li>

                    <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Listar

                    <span class="caret"></span></a>

                    <ul class="dropdown-menu">

                        <li><a href="ListaAlbunsLogado.php">Álbuns</a></li>

                        <li><a href="ListaArtistasLogado.php">Artistas/Bandas</a></li>

                        <li><a href="ListaMusicasLogado.php">Músicas</a></li>

                    </ul>

                    </li>

                    <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inserir

                    <span class="caret"></span></a>

                    <ul class="dropdown-menu">

                        <li><a href="InserirAlbum.php">Novo Álbum</a></li>

                        <li><a href="InserirArtista.php">Novo Artista/Banda</a></li>

                    </ul>

                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="index.php?acao=logout"><?php echo "$mostrar" ?>(Logoff)</a></li>

                    <li style="padding: 7px;"><form class="form-inline pull-xs-right" method="post" action="PesquisaEspecial.php">

                    <input class="form-control" type="text" name="pesquisa" style="width:260px; margin: auto;" placeholder="Pesquisar Artistas, Álbuns e Músicas">

                    <button class="btn btn-outline-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>

                  </form></li>

                     

                </ul>

              </div>

          </div>

        </div><!-- /container -->

        </div><!-- /navbar wrapper -->

      

        <div class="container marketing"  id="fundo" style=" height: 150px;">

        <!-- Three columns of text below the carousel -->

        <div class="row">

            <div id="centralizar" style="width:70%; margin:auto; height: 70%;">

                <br><br><br><br><br>

                <label for="login" class="titulo">Lista de Usuários </label>

                <br><br><br>

                <a class="btn btn-primary btn-lg" href="NovoUsuario.php">+ Novo Usuário</a>

                <br><br><br>

                <?php

                    $usuarios=mysql_query("SELECT * FROM usuario WHERE nivel=2") or die("Impossível executar a query"); 
                    $superadmin=mysql_query("SELECT * FROM usuario WHERE nivel=0") or die("Impossível executar a query"); 
                    $admins=mysql_query("SELECT * FROM usuario WHERE nivel=1") or die("Impossível executar a query"); 
                    $contarusuario=mysql_num_rows($usuarios);
                    $contaradmin=mysql_num_rows($admins);
                    if ($contarusuario > 0){
                    echo "<div class='table-responsive'>";

                    echo "<table class='table table-striped' id='table' name='table'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo   "<th class='frm'>ID</th>";

                    echo   "<th class='frm'>Nome</th>";

                    echo   "<th class='frm'>E-mail</th>";

                    echo   "<th class='frm'>Imagem</th>";

                    echo   "<th class='frm'>Opções</th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";

                    while ($arquivos = mysql_fetch_array($usuarios)) {

                        echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal' data-id=".$arquivos['ID']." onClick=" .$idexcluir. "=".$arquivos['ID']." >";

                        echo "<td align='left'>".$arquivos['ID']."</td>";    

                        echo "<td align='left'>".$arquivos['nome']."</td>";

                        echo "<td align='left'>".$arquivos['email']."</td>";

                        echo "<td align='left'><img src='img/".$arquivos['imagem']."' height='50' width='50' ></td>";

                        echo "<td align='left'> <a class='btn btn-warning btn-xs' href='EditarUsuario.php?acao=".$arquivos['ID']."'>Editar</a>  "

                            . "<a  class='btn btn-danger btn-xs' href='RemoverUsuario.php?acao=".$arquivos['ID']."'>Excluir</a> </td>";

                        echo "</tr>";

                    }

                    echo "</tbody>";

                    echo "</table>";

                    echo "</div>";
                    }else{
                        echo '<h3 for="login">Sem usuários para exibir. </h3>';
                    }

                    echo '<br><br><br>';

                    echo '<label for="login" class="titulo">Lista de Administradores </label>';
                    if ($contaradmin > 0){
                    
                    echo '<br><br><br>';

                    echo "<div class='table-responsive'>";

                    echo "<table class='table table-striped' id='table' name='table'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo   "<th class='frm'>ID</th>";

                    echo   "<th class='frm'>Nome</th>";

                    echo   "<th class='frm'>E-mail</th>";

                    echo   "<th class='frm'>Imagem</th>";

                    echo   "<th class='frm'>Opções</th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";

                    while ($arquivos2 = mysql_fetch_array($admins)) {

                        echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal' data-id=".$arquivos2['ID']." onClick=" .$idexcluir. "=".$arquivos2['ID']." >";

                        echo "<td align='left'>".$arquivos2['ID']."</td>";    

                        echo "<td align='left'>".$arquivos2['nome']."</td>";

                        echo "<td align='left'>".$arquivos2['email']."</td>";

                        echo "<td align='left'><img src='img/".$arquivos2['imagem']."' height='50' width='50' ></td>";

                        echo "<td align='left'> <a class='btn btn-warning btn-xs' href='EditarUsuario.php?acao=".$arquivos2['ID']."'>Editar</a> "
                                
                        . "<a  class='btn btn-danger btn-xs' href='RemoverUsuario.php?acao=".$arquivos2['ID']."'>Excluir</a> </td>";

                        echo "</tr>";

                    }


                    echo "</tbody>";

                    echo "</table>";

                    echo "</div>";
                    }else{
                        echo '<h3 for="login">Sem administradores para exibir. </h3>';
                    }
                    echo '<br><br><br>';

                    

                    echo '<label for="login" class="titulo">Super Admin </label>';

                    echo '<br><br><br>';

                    echo "<div class='table-responsive'>";

                    echo "<table class='table table-striped' id='table' name='table'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo   "<th class='frm'>ID</th>";

                    echo   "<th class='frm'>Nome</th>";

                    echo   "<th class='frm'>E-mail</th>";

                    echo   "<th class='frm'>Imagem</th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";

                    while ($arquivos3 = mysql_fetch_array($superadmin)) {

                        echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal' data-id=".$arquivos3['ID']." onClick=" .$idexcluir. "=".$arquivos3['ID']." >";

                        echo "<td align='left'>".$arquivos3['ID']."</td>";    

                        echo "<td align='left'>".$arquivos3['nome']."</td>";

                        echo "<td align='left'>".$arquivos3['email']."</td>";

                        echo "<td align='left'><img src='img/".$arquivos3['imagem']."' height='50' width='50' ></td>";

                        echo "</tr>";

                    }


                    echo "</tbody>";

                    echo "</table>";

                    echo "</div>";
                ?>

                <br>

                <br>

                <a class="btn btn-success btn-lg btn-default" href="index.php">Voltar</a>

                
            </div>

        </div><!-- /.row -->

        <hr class="featurette-divider">

        <!-- FOOTER -->

        <footer>

          <p class="pull-right"><a href="#">Back to top</a></p>

          <div style="width:500px; height:50px;">

            <div style="width:200px; float:left; padding:0px;">

                <a class="btn btn-md btn-block btn-social btn-github" href="https://github.com/Rickhvb" target="_blank" style="width: 200px;">

              <span class="fa fa-github"></span> Meu GitHub</a>

            </div>

            <div>

                <div style="width:220px; float:left; padding: 5px;">

                <p>MusicLab - Developed by Luis :)</p>  </div>

          </div>

          </div>

        </footer>

        </div><!-- /.container -->

              <!-- script references -->

                      <script src="js/jquery.js"></script>

                      <script src="js/bootstrap.min.js"></script>

                      <script type="text/javascript">

                        $(document).ready(function() {

                        $('tr').click(function () { 

                        var id = $(this).attr("data-id");

                        $idexcluir = id;

                        });

                        });

                    </script>

    </body>

</html>
