
<?php

if(isset($logado)){

    if($nivel=="usuario"){

        $mostrar= "Logado como $exibicao ";

    }

    else{

        include("AdminLogado.php");

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

        <title>Usuario Logado</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link href="css/bootstrap.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

        <link href="css/bootstrap-social.css" rel="stylesheet" >

        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    </head>

    <body id="fundo" style="height:200px;">

        

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

        

        <!-- Carousel

================================================== -->

        <div id="myCarousel" class="carousel slide" style=" height: 300px;">

          <!-- Indicators -->

          <ol class="carousel-indicators"  style="height: 0px;">

            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

            <li data-target="#myCarousel" data-slide-to="1"></li>

            <li data-target="#myCarousel" data-slide-to="2"></li>

          </ol>

          <div class="carousel-inner" style="height:300px;">

            <div class="item active" >

                <img src="img\Fundo0.png" style="width:100%; height:70%;" class="img-responsive">

              <div class="container">

                <div class="carousel-caption">

                </div>

              </div>

            </div>

            <div class="item">

                <img src="img\Fundo1.png" style="width:100%; height:70%;" class="img-responsive">

              <div class="container">

                <div class="carousel-caption">

                </div>

              </div>

            </div>

            <div class="item">

              <img src="img\Fundo2.png" style="width:100%; height:70%;" class="img-responsive">

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

      

        <div class="container marketing"  id="fundo" style=" height: 150px;">

        <!-- Three columns of text below the carousel -->

        <div class="row">

            <br>

            <div id="centralizar">

                <a class="btn btn-lg btn-default" href="ListaArtistasLogado.php" style="width:150px;">Artistas/Bandas</a>

                <a class="btn btn-lg btn-default" href="ListaMusicasLogado.php" style="width:150px;">Músicas</a>

                <a class="btn btn-lg btn-default" href="ListaAlbunsLogado.php" style="width:150px;">Álbuns</a>

                <a class="btn btn-lg btn-default" href="InserirAlbum.php" style="width:150px;">Inserir Álbum</a>

                <a class="btn btn-lg btn-default" href="InserirArtista.php" style="width:150px;">Inserir Artista</a>

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
