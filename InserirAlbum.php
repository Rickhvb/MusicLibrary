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

        <title>Novo Álbum</title>

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

        <div class="row">    

        <!-- Three columns of text below the carousel -->

        

        <div id="login" style="width:40%; margin:auto; height: 30%;">

            <br><br><br><br>

            <? if(strlen($msg)==31): ?>

            <div id="confirmacao"> <?php echo $msg; ?> </div>

            <? else: ?>

            <div id="erro"> <?php echo $msg; ?> </div>

            <? endif; ?>

            <br>

            <label for="login" class="titulo">Inserir Novo Álbum </label>

                <form action="?acao=cadastrarAlbum" method="post" enctype="multipart/form-data" >

                <div class="frm">

                    <label for="nome">Nome: </label><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="album" value="<?=(isset($_POST['album']))? $_POST['album'] : ''?>" />

                </div>

                <div class="frm">

                    <label for="artista">Artista/Banda: </label>

                

                    <?php

                    $result=mysql_query("SELECT *FROM artista") or die("Impossível executar a query"); 

                    $rows = array();

                    while($row = mysql_fetch_array($result)){

                    $rows[] = $row;}

                        echo '<select name="artista" id="artista" style="width: 200px;">';

                        echo '<option>Selecione...</option>';

                        foreach($rows as $row){ 

                            $artista = stripslashes($row['nome']);

                        echo "<option value='$artista'"; if(isset($_POST['artista']) && $_POST['artista']==$artista) { echo "selected='selected'>$artista</option>";} else {echo ">$artista</option>";}

                                }

                        echo '</select>';

                ?>  

                 </div>   

                <div class="frm">

                    <label for="ano">Ano de Lançamento: </label>

                    <select name="ano" value="Selecione" id="ano" style="width: 200px;">

                        <option>Selecione...</option>

                         <?php 

                            for ($i = 2017; $i > 1899; $i--) {

                                echo "<option value='$i'"; if(isset($_POST['ano']) && $_POST['ano']==$i) { echo "selected='selected'>$i</option>";} else {echo ">$i</option>";}

                            }

                         ?>

                      </select> 

                </div>

                <div class="frm">

                    <input type="hidden" name="size" value="1000000">

                    <label for="imagem">Imagem da Capa: </label><input type="file" id="diretorio" name="imagem"/>

                </div>

                    <br><br>

                    <a class=" btn btn-primary" href='#direcionar' onclick="MostrarDiv('esconder');">+ Adicionar Músicas</a>

                    

                    <!--Funçao para mostrar a div onde se encontra novas linhas para inserçao de nova música ao álbum  -->

                    <script>

                    function MostrarDiv(el) {

                    var display = document.getElementById(el).style.display;

                    if(display === "none")

                        document.getElementById(el).style.display = 'block';

                    }

                    </script>

                    <br><br><br>
                <a name="direcionar"></a>
                <div id="esconder" style="display: none">

                <div class="frm">

                    <label for="imagem">Músicas: (Insira no máximo 30 faixas)

                </div>  

                    <div style="width: 500px;float:left;"> 

                        <div style="width: 90px;float:left;">Número</div> 

                        <div style="width: 190px;float:left;">Nome</div> 

                        <div style="width: 80px;float:left;">Duração</div> 

                        <div style="width: 100px;float:left;">Compositor</div>

                    </div>

                    <div class="input_fields_wrap">

                    <div class="frm" style="float:left; width: 1000px;">

                        <input type="text"  name="numero[]" style="width: 80px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" readonly="readonly" value="1">

                        <input  name="nome[]" style="width: 190px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="text"  value=""/>

                        <input  name="duracao[]" style="width: 80px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="time" maxlength="5" value="" id="hora"/>

                        <input  name="compositor[]" style="width: 140px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="text"  value=""/>

                         

                    </div>

                    </div>

                    

                    <br>

                    <button class="add_field_button btn btn-info">Adicionar mais uma Faixa</button>

                </div>

                    <br><br>

                    

                    

                <div class="frm">

                    <input class="btn btn-success btn-lg btn-default" type="submit" value="Cadastrar"/>

                    <input class="btn btn-warning btn-lg btn-default" type="reset" value="Limpar"/>

                </div>

                </form>

            <br><br>

            <a class="btn btn-danger btn-lg btn-default"  href="index.php">Cancelar</a>

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

              

                      <script src="js/jquery.mask.js"></script>

                      <script src="js/jquery.js" type="text/javascript"></script>

                      <script src="js/bootstrap.min.js"></script>

                      

                      <!--Funçao que adiciona novas linhas para inserçao de nova música a ser incluída no álbum -->

                      <script type="text/javascript">

                        var max_fields      = 30; 

                        var wrapper                   = $(".input_fields_wrap");

                        var add_button      = $(".add_field_button");


                        var x = 1; 

                        $(add_button).click(function(e){ 

                                e.preventDefault();

                                if(x < max_fields){ 

                                        x++; 

                                        $(wrapper).append('<div class="frm" style="float:left; width: 1000px;" >'

                          +'<input type="text"  name="numero[]" readonly="readonly" style="width: 80px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" value="'+x+'">'

                            +'<input  name="nome[]" style="width: 190px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="text"  value=""/>'

                            +'<input  name="duracao[]" style="width: 80px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="time" maxlength="5" value="" id="hora"/>'

                            +'<input  name="compositor[]" style="width: 140px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="text"  value=""/>'

                            +'<a href="#" class="remove_field">Remover</a> </div>'); //add input box

                                }

                        });


                        $(wrapper).on("click",".remove_field", function(e){ 

                                e.preventDefault(); $(this).parent('div').remove(); x--;

                        });

                    </script>

                    

    </body>

</html>
