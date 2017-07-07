
<?php

    include("controller/header.php");

    $idExcluir="1";

    $arquivos="";

    if(isset($logado)){

        if($nivel=="usuario"){

            Include("VerArtistaLogado.php");

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

        <title>Detalhe Artista</title>

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

        <!-- Three columns of text below the carousel -->

        <div class="row">

            <div id="centralizar" style="width:80%; margin:auto; height: 100%;">

                <br><br><br><br><br>

                <label for="login" class="titulo">Detalhes do Artista/Banda </label>

                <br><br><br>

                <?php

                    $result=mysql_query("SELECT * from artista where ID='$acao'") or die("Impossível executar a query"); 

                    $arquivos = mysql_fetch_array($result);

                    $pesquisaalbuns=mysql_query("SELECT *from album WHERE artista='$acao'") or die("Impossível executar a query"); 

                    

                echo "<div style='width: 1000px; float:left;'>";

                echo "<div style='width: 500px; float:left;'>";

                echo "<h1 class='titulo' style='font-size: 70px;' >";

                echo $arquivos['nome'];

                echo "</h1>"; 

                echo "<h3 style='font-size: 40px;'>";

                echo $arquivos['genero'];

                echo "</h3>";

                echo "<h3 style='font-size: 20px;'>";

                echo $arquivos['descricao'];

                echo "</h3>";

                echo "<h1 class='titulo' style='font-size: 35px; float:center; width: 30px; ' >";

                echo "Álbuns";

                echo "</h1>";

                echo "</div>";

                

                $rows = array();

                while($row = mysql_fetch_array($pesquisaalbuns))

                    $rows[] = $row;

                echo "<div style=' width:500px; height:500px; float:right;'>";

                echo "<img src='img/".$arquivos['imagem']."' height='400' width='400' />";

                echo "</div>";

                echo "<div class='table-responsive' style='float:left; width:500px;'>";

                echo "<table class='table table-striped' style='float:left;'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo   "<th class='frm'>Título</th>";

                    echo   "<th class='frm'>Ano</th>";

                    echo   "<th class='frm'>Capa</th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";

                foreach($rows as $row){ 

                    $enome = stripslashes($row['nome']);

                    $eano = stripslashes($row['ano']);

                    $eimagem = stripslashes($row['imagem']);

                    echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal'>";

                        echo "<td align='left'>".$enome."</td>";    

                        echo "<td align='left' width='100px'>".$eano."</td>";

                        echo "<td align='left'><img src='img/".$eimagem."' height='50' width='50' ></td>";

                        echo "</tr>";

                }

                echo "</tbody>";

                

                echo "</table>";

                

                echo "</div>";

                echo "</div>";

                ?>

                

            </div>

            

        </div><!-- /.row -->

        <div style="width: 1000px;">

        <div style="width: 500px; float: right;"><a  class="btn btn-success btn-lg btn-default" href="ListaArtistas.php">Voltar</a></div>

        </div>

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
