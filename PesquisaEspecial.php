<?php

include("controller/header.php");

$idExcluir="1";

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

        <title>Resultados da Busca</title>

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

                <?php

                $palavra=$_POST["pesquisa"];

                echo '<label for="login" class="titulo">Resultado da busca pela palavra "'.$palavra.'" </label>';

                echo '<br><br><br>';

                

                    $pesquisamusica=mysql_query("SELECT m.id,m.numero,ar.nome as artista, m.nome as musica,m.duracao,m.compositor,a.nome "

                            . "FROM musica m,album a, artista ar WHERE a.id=m.album AND ar.id=a.artista AND m.nome LIKE '%$palavra%'") or die("Impossível executar a query"); 

                    $pesquisaartista=mysql_query("SELECT * FROM artista WHERE nome LIKE '%$palavra%'") or die("Impossível executar a query"); 

                    $pesquisaalbum=mysql_query("SELECT a.id,a.nome,ar.nome as artista,a.ano,a.imagem"

                            . " FROM album a, artista ar WHERE ar.id=a.artista AND a.nome LIKE '%$palavra%'") or die("Impossível executar a query");

                    $contarmusica=mysql_num_rows($pesquisamusica);

                    $contaralbum=mysql_num_rows($pesquisaalbum);

                    $contarartista=mysql_num_rows($pesquisaartista);

                    if ($contarmusica == 0 && $contaralbum == 0 && $contarartista == 0){
                        echo '<h3 for="login">Sua busca não retornou nenhum resultado. </h3>';
                    }
                    if($contarmusica>0){

                        echo '<label for="login" class="titulo">Músicas </label>';

                        echo '<br>';

                        echo "<div class='table-responsive'>";

                        echo "<table class='table table-striped'>";

                        echo "<thead>";

                        echo "<tr>";

                        echo   "<th class='frm'>ID</th>";

                        echo   "<th class='frm'>Número</th>";

                        echo   "<th class='frm'>Nome</th>";

                        echo   "<th class='frm'>Artista/Banda</th>";

                        echo   "<th class='frm'>Duração</th>";

                        echo   "<th class='frm'>Compositor</th>";

                        echo   "<th class='frm'>Álbum</th>";

                        echo "</tr>";

                        echo "</thead>";

                        echo "<tbody>";

                        while ($resultadomusica=mysql_fetch_array($pesquisamusica)) {

                            echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal' data-id=".$resultadomusica['id']." onClick=" .$idExcluir. "=".$resultadomusica['id']." >";

                            echo "<td align='left'>".$resultadomusica['id']."</td>";    

                            echo "<td align='left'>".$resultadomusica['numero']."</td>";

                            echo "<td align='left'>".$resultadomusica['musica']."</td>";

                            echo "<td align='left'>".$resultadomusica['artista']."</td>";

                            echo "<td align='left'>".$resultadomusica['duracao']."</td>";

                            echo "<td align='left'>".$resultadomusica['compositor']."</td>";

                            echo "<td align='left'>".$resultadomusica['nome']."</td>";

                            echo "</tr>";

                        }

                        echo "</tbody>";

                        echo "</table>";

                        echo "</div>";

                    }

                    echo '<br><br>';

                    if($contarartista>0){

                        echo '<label for="login" class="titulo">Artistas/Bandas </label>';

                        echo '<br>';

                        echo "<div class='table-responsive'>";

                        echo "<table class='table table-striped'>";

                        echo "<thead>";

                        echo "<tr>";

                        echo   "<th class='frm'>ID</th>";

                        echo   "<th class='frm'>Nome</th>";

                        echo   "<th class='frm'>Gênero</th>";

                        echo   "<th class='frm'>Descrição</th>";

                        echo   "<th class='frm'>Imagem</th>";

                        echo   "<th class='frm'>Opções</th>";

                        echo "</tr>";

                        echo "</thead>";

                        echo "<tbody>";

                        while ($resultadoartista=mysql_fetch_array($pesquisaartista)) {

                            echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal' data-id=".$resultadoartista['ID']." onClick=" .$idExcluir. "=".$resultadoartista['ID']." >";

                            echo "<td align='left'>".$resultadoartista['ID']."</td>";    

                            echo "<td align='left'>".$resultadoartista['nome']."</td>";

                            echo "<td align='left'>".$resultadoartista['genero']."</td>";

                            echo "<td align='left'>".$resultadoartista['descricao']."</td>";

                            echo "<td align='left'><img src='img/".$resultadoartista['imagem']."' height='50' width='50' ></td>";

                            echo "<td align='left'> <a class='btn btn-primary btn-xs' href='VerArtistaLogado.php?acao=".$resultadoartista['ID']."'>+ Detalhes</a>"

                            ." <a class='btn btn-warning btn-xs' href='EditarArtista.php?acao=".$resultadoartista['ID']."''>Editar</a>"

                            . " <a  class='btn btn-danger btn-xs' href='RemoverArtista.php?acao=".$resultadoartista['ID']."' >Excluir</a> </td>";

                        echo "</tr>";

                        }

                        echo "</tbody>";

                        echo "</table>";

                        echo "</div>";

                    }

                    echo '<br><br>';

                    if($contaralbum>0){

                        echo '<label for="login" class="titulo">Álbuns </label>';

                        echo '<br>';

                        echo "<div class='table-responsive'>";

                        echo "<table class='table table-striped' >";

                        echo "<thead>";

                        echo "<tr>";

                        echo   "<th class='frm'>ID</th>";

                        echo   "<th class='frm'>Nome</th>";

                        echo   "<th class='frm'>Artista/Banda</th>";

                        echo   "<th class='frm'>Ano</th>";

                        echo   "<th class='frm'>Capa</th>";

                        echo   "<th class='frm'>Opções</th>";

                        echo "</tr>";

                        echo "</thead>";

                        echo "<tbody>";

                        while ($resultadoalbum=mysql_fetch_array($pesquisaalbum)) {

                            echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal' data-id=".$resultadoalbum['id']." onClick=" .$idExcluir. "=".$resultadoalbum['id']." >";

                            echo "<td align='left'>".$resultadoalbum['id']."</td>";    

                            echo "<td align='left'>".$resultadoalbum['nome']."</td>";

                            echo "<td align='left'>".$resultadoalbum['artista']."</td>";

                            echo "<td align='left'>".$resultadoalbum['ano']."</td>";

                            echo "<td align='left'><img src='img/".$resultadoalbum['imagem']."' height='50' width='50' ></td>";

                            echo "<td align='left'> <a class='btn btn-primary btn-xs' href='VerAlbumLogado.php?acao=".$resultadoalbum['id']."'>+ Detalhes</a>"

                            ." <a class='btn btn-warning btn-xs' href='EditarAlbum.php?acao=".$resultadoalbum['id']."'>Editar</a> "

                            . "<a  class='btn btn-danger btn-xs' href='RemoverAlbum.php?acao=".$resultadoalbum['id']."'  >Excluir</a> </td>";

                        echo "</tr>";

                        }

                        echo "</tbody>";

                        echo "</table>";

                        echo "</div>";

                    }

                ?>

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
