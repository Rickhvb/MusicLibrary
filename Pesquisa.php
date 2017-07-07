
<?php

include("controller/header.php");

$idExcluir="1";

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

        <title>Resultado da Busca</title>

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

            <div id="centralizar" style="width:70%; margin:auto; height: 70%;">

                <br><br><br><br><br>

                <?php

                $palavra=$_POST["pesquisa"];

                echo '<label for="login" class="titulo">Resultado da sua Busca pela palavra "'.$palavra.'" </label>';

                echo '<br><br><br>';

                

                    $pesquisamusica=mysql_query("SELECT m.id,m.numero,ar.nome as artista, m.nome as musica,m.duracao,m.compositor,a.nome "

                            . "FROM musica m,album a, artista ar WHERE a.id=m.album AND ar.id=a.artista AND m.nome LIKE '%$palavra%'") or die("Impossível executar a query"); 

                    $pesquisaartista=mysql_query("SELECT * FROM artista WHERE nome LIKE '%$palavra%'") or die("Impossível executar a query"); 

                    $pesquisaalbum=mysql_query("SELECT a.id,a.nome,ar.nome as artista,a.ano,a.imagem"

                            . " FROM album a, artista ar WHERE ar.id=a.artista AND a.nome LIKE '%$palavra%'") or die("Impossível executar a query");

                    $contarmusica=mysql_num_rows($pesquisamusica);

                    $contaralbum=mysql_num_rows($pesquisaalbum);

                    $contarartista=mysql_num_rows($pesquisaartista);

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

                            echo "<td align='left'> <a class='btn btn-primary btn-xs' href='VerArtista.php?acao=".$resultadoartista['ID']."'>+ Detalhes </td>";

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

                            echo "<td align='left'> <a class='btn btn-primary btn-xs' href='VerAlbum.php?acao=".$resultadoalbum['id']."'>Detalhes </td>";

                            echo "</tr>";

                        }

                        echo "</tbody>";

                        echo "</table>";

                        echo "</div>";

                    }

                ?>

                

                <br>

                <div id="bottom" class="row">

                <div class="col-md-12">

                    <ul class="pagination">

                        <li class="disabled"><a>&lt; Anterior</a></li>

                        <li class="disabled"><a>1</a></li>

                        <li><a href="#">2</a></li>

                        <li><a href="#">3</a></li>

                        <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>

                    </ul><!-- /.pagination -->

                </div>

                </div> <!-- /#bottom -->

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
