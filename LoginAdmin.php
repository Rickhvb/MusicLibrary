<?php
include("controller/header.php");
if(isset($logado)){
    $mostrar= "Logado como $exibicao ";
    if($nivel=="usuario"){
        include("UsuarioLogado.php");
    }
    else{
        include("AdminLogado.php");
    }
}
else{
    $exibicao="Visitante";
    $mostrar= "Olá, $exibicao! ";
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
        <title>Login Admin</title>
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Opções
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ListaAlbuns.php">Ver Álbuns</a></li>
                        <li><a href="ListaArtistas.php">Ver Artistas/Bandas</a></li>
                        <li><a href="ListaMusicas.php">Ver Músicas</a></li>
                    </ul>
                    </li>
                    <li><a href="Cadastro.php">Cadastro</a></li>
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="LoginAdmin.php">Administrador</a></li>
                        <li><a href="LoginUser.php">Usuário</a></li>
                    </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="padding: 14px;"><?php echo "$mostrar" ?></li>
                    <li style="padding: 7px;"><form class="form-inline pull-xs-right" method="post" action="Pesquisa.php">
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
        <div id="centralizar" style="width:30%; margin:auto; height: 70%;">
                <br><br><br><br><br>
            <? if(strlen($msg)==19): ?>
            <div id="confirmacao"> <?php echo $msg; ?> </div>
            <? else: ?>
            <div id="erro"> <?php echo $msg; ?> </div>
            <? endif; ?>
            <br>
            <label for="login" class="titulo">Login Administrador</label>
            <br>
                <form action="?acao=logarAdmin" method="post" >
                <div class="frm">
                    <label for="email">E-mail: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="email" value=""/>
                </div>
                <div class="frm">
                    <label for="senha">Senha: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="password" name="senha" value=""/>
                </div>
                <div class="frm">
                    <input class="btn btn-success btn-lg btn-default" type="submit" value="Entrar"/>
                </div>
                </form>
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
