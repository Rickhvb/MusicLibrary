<?php
include("controller/header.php");
if(isset($logado)){
    if($nivel=="usuario"){
        include("UsuarioLogado.php");
    }
    else{
        $mostrar= "Logado como $exibicao ";
    }
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
        <title>Novo Usuario</title>
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
      
        <div class="container marketing"  id="fundo" style=" height: 150px;">
        <div class="row">    
        <!-- Three columns of text below the carousel -->
        
        <div id="login" style="width:30%; margin:auto; height: 70%;">
            <br><br><br><br>
            <? if(strlen($msg)==31): ?>
            <div id="confirmacao"> <?php echo $msg; ?> </div>
            <? else: ?>
            <div id="erro"> <?php echo $msg; ?> </div>
            <? endif; ?>
            <label for="login" class="titulo">Cadastrar Usuário </label>
            <br>
                <form action="?acao=cadastrarUsuario" method="post" enctype="multipart/form-data" >
                <div class="frm">
                    <label for="nome">Nome: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="nome" value=""/>
                </div>
                <div class="frm">
                    <label for="email">E-mail: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="email" value=""/>
                </div>
                <div class="frm">
                    <label for="senha">Senha: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="password" name="senha" value=""/>
                </div>
                <div class="frm">
                    <label for="senha2">Confirme a Senha: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="password" name="senha2" value=""/>
                </div>
                <div class="frm">
                    <input type="hidden" name="size" value="1000000">
                    <label for="imagem">Imagem: </label><input type="file" id="diretorio" name="imagem"/>
                </div>
                <div class="frm">
                    <label for="senha2">Permissões: </label>
                    <input type="radio" name="nivel" value="Administrador">Administrador
                    <input type="radio" name="nivel" value="Usuário Comum" checked="checked" >Usuário Comum
                    
                </div>
                    <br>
                <div class="frm">
                    <input class="btn btn-success btn-lg btn-default" type="submit" value="Cadastrar"/>
                    <input class="btn btn-warning btn-lg btn-default" type="reset" value="Limpar"/>
                </div>
                </form>
            <br>
            <a class="btn btn-danger btn-lg btn-default"  href="ListaUsuarios.php">Cancelar</a>
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
    </body>
</html>
