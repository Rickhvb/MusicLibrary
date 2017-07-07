<?php
include("controller/header.php");
if(isset($logado)){
    $mostrar= "Logado como $exibicao ";
}
else{
    $exibicao="Visitante";
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
        <title>Remover Usuario</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link href="css/bootstrap-social.css" rel="stylesheet" >
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
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
      
        <div class="container marketing"  id="fundo" style=" width:90%; height: 150px;">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            
            <div id="centralizar" style="width:100%; margin:auto; height: 70%;">
                <br><br><br><br>
            <? if(strlen($msg)==31): ?>
            <div id="confirmacao"> <?php echo $msg; ?> </div>
            <? else: ?>
            <div id="erro"> <?php echo $msg; ?> </div>
            <? endif; ?>
                <form action="ListaUsuarios.php?acao=removerUsuario" method="post">
                <h1 for="login" class="titulo">Confirmação de exclusão do Usuário </h1>
                <?php
<<<<<<< HEAD
                    $codigousuario=$_GET["acao"];
=======
                    $host = "localhost";
                    $username = "root";
                    $password = "123";
                    $db = "MusicLibrary";
                    $codigousuario=$_GET["acao"];
                    mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

                    @mysql_select_db($db) or die("Impossível conectar ao banco"); 

>>>>>>> e4b48a3aed76faa29ac9e1a873ad8ef17a1faabe
                    $result=mysql_query("SELECT *FROM usuario WHERE id='$acao' ") or die("Impossível executar a query"); 
                    $arquivos = mysql_fetch_array($result);
                echo "<div style='width: 1100px; height:300px;>";
                echo "<div style='width: 1100px;'>";
                echo "<h1 class='titulo' style='font-size: 40px;' >";
                echo $arquivos['nome'];
                echo "<input type='hidden' class='form-control mb-2 mr-sm-2 mb-sm-0' type='text' name='id' value='".$arquivos['ID']."'/>";
                echo "</h1>"; 
                echo "<h3 style='font-size: 20px;'>";
                echo $arquivos['email'];
                echo "</h3>";
                echo "<div style=' width:1100px; height:300px;'>";
                echo "<img src='img/".$arquivos['imagem']."' height='300' width='300' />";
                echo "</div>";
                ?>
                <br>
                    <input class="btn btn-success btn-lg btn-default" type="submit" value="Confirmar"/>
                    <br><br>
                    <div><a  class="btn btn-primary btn-lg btn-default" href="ListaUsuarios.php">Voltar</a></div>
                    
                </form>
            
            </div>
           <br><br><br><br><br><br><br><br> 
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
    </body>
</html>
