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
        <title>MusicLab</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="Cadastro.php">Cadastro</a></li>
                    <li><a href="LoginAdmin.php">Admin</a></li>
                    <li><a href="LoginUser.php">Login</a></li>
                    <li><a href="index.php">Logoff</a></li>
                </ul>
              </div>
          </div>
        </div><!-- /container -->
        </div><!-- /navbar wrapper -->
      
      <!-- Carousel
================================================== -->
        <div id="myCarousel" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
                <img src="\MusicLibrary\img\Fundo0.png" style="width:100%" class="img-responsive">
              <div class="container">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
            <div class="item">
                <img src="\MusicLibrary\img\Fundo1.png" class="img-responsive">
              <div class="container">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
            <div class="item">
              <img src="\MusicLibrary\img\Fundo2.png" class="img-responsive">
              <div class="container">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
          </a>  
        </div>
        <!-- /.carousel -->
      
        
        <div class="container marketing" id="fundo">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <?php

            ?>
            <div id="centralizar">
                <a class="btn btn-lg btn-default" href="ListaArtistas.php">Listar Artistas</a>
                <a class="btn btn-lg btn-default" href="ListaMusicas.php">Listar Músicas</a>
                <a class="btn btn-lg btn-default" href="ListaAlbuns.php">Listar Álbuns</a>
            </div>
        </div><!-- /.row -->
        <hr class="featurette-divider">
        <!-- FOOTER -->
        <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>MusicLab - Developed by Luis :)  </p>
        </footer>
        </div><!-- /.container -->
              <!-- script references -->
                      <script src="js/jquery.js"></script>
                      <script src="js/bootstrap.min.js"></script>
    </body>
</html>
