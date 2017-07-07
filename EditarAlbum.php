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
        <title>Editar Album</title>
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
      
        
        <div class="container marketing" id="fundo" style=" height: 150px;">
        <div class="row">    
        <!-- Three columns of text below the carousel -->
        
        <div id="login" style="width:65%; margin:auto; height: 70%;">
            <br><br><br><br>
            <? if(strlen($msg)==18): ?>
            <div id="confirmacao"> <?php echo $msg; ?> </div>
            <? else: ?>
            <div id="erro"> <?php echo $msg; ?> </div>
            <? endif; ?>
            <h1 class='titulo' style='font-size: 40px; float:center; width: 200px; '>Editar Álbum</h1>
            
            <?php
                    $result=mysql_query("SELECT a.id,a.nome,a.imagem,a.ano,ar.nome as artista from album a,artista ar where a.artista=ar.id and a.id='$acao'") or die("Impossível executar a query"); 
                    $arquivos = mysql_fetch_array($result);
                    $pesquisamusicas=mysql_query("SELECT *from musica WHERE album='$acao'") or die("Impossível executar a query"); 
                    
                echo "<form action='?acao=atualizarAlbum' method='post' enctype='multipart/form-data' >";
                echo "</label><input type='hidden' class='form-control mb-2 mr-sm-2 mb-sm-0' type='text' name='id' value='".$arquivos['id']."'/>";
                echo "<div class='frm'>";
                echo    "<label for='album'>Nome: </label><input class='form-control mb-2 mr-sm-2 mb-sm-0' type='text' name='album' value='".$arquivos['nome']."'/>";
                echo "</div>";
                echo "<div class='frm'>";
                echo    "<label for='artista'>Artista/Banda: </label><input class='form-control mb-2 mr-sm-2 mb-sm-0' type='text' name='artista' value='".$arquivos['artista']."'/>";
                echo "</div>";
                echo "<div class='frm'>";
                echo    "<label for='ano'>Ano de Lançamento: </label>";
                echo    "<select selected=".$arquivos['ano']." value=".$arquivos['ano']." name='ano' id='ano' style='width: 200px;'>";
                echo    "<option>Selecione...</option>";
                for ($i = 2017; $i > 1899; $i--) {
                echo    "<option value=$i"; if($arquivos['ano']==$i){ echo " selected='selected'";} echo ">$i</option>";
                        }
                echo    "</select>"; 
                echo    "</div>";
                
                echo    "<div class='frm' style='width:800px; height:100px;'>";
                echo    "<div class='frm' style='width:200px; height:100px; float:left'>";
                echo    "<input type='hidden' name='size' value='1000000'>";
                echo    "<td align='left'><img src='img/".$arquivos['imagem']."' height='200' width='200' ></td>";
                echo    "</div>";
                echo    "<div class='frm' style='width:400px; height:100px; float:left;'>";
                echo    "<input type='hidden' name='size' value='1000000'>";
                echo    "<label for='imagem'>Alterar Capa: </label><input type='file' id='diretorio' name='imagem'/>";
                
                echo    "</div>";
                
                echo    "</div>";
                
                echo    "<br><br><br><br><br><br><br>";
                echo "<h1 class='titulo' style='font-size: 35px; float:center; width: 1000px; ' >";
                echo "Faixas do Álbum";
                echo "</h1>";
                
                $rows = array();
                while($row = mysql_fetch_array($pesquisamusicas))
                    $rows[] = $row;
                
                echo "<div class='table-responsive' style=' width:600px; margin:auto;'>";
                echo "<table name='tabelamusicas' id='myTable' class='table table-striped'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo   "<th style='visibility: hidden; width:0px;' class='frm'>ID</th>";
                    echo   "<th class='frm'>Nº Faixa</th>";
                    echo   "<th class='frm'>Título</th>";
                    echo   "<th class='frm'>Duração</th>";
                    echo   "<th class='frm'>Compositor</th>";
                    echo   "<th class='frm' >Opções</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                foreach($rows as $row){ 
                    $eid = stripslashes($row['ID']);
                    $enumero = stripslashes($row['numero']);
                    $enome = stripslashes($row['nome']);
                    $eduracao = stripslashes($row['duracao']);
                    $ecompositor = stripslashes($row['compositor']);
                    echo "<tr data-target='#myModal' id='delete-row' data-toggle='modal'>";
                    echo "<td style='visibility: hidden;' name='numero[]' id='$eid'>".$eid."</td>";
                    echo "<td name='numero[]' id='$enumero' align='left'  width='100px'>".$enumero."</td>";    
                    echo "<td name='nome[]' id='$enome' align='left' width='1200px'>".$enome."</td>";
                    echo "<td name='duracao[]' id='$eduracao' align='left'  width='300px'>".$eduracao."</td>";
                    echo "<td name='compositor[]' id='$eid' align='left' width='500px'>".$ecompositor."</td>";
                    echo "<td align='left'> "
                        //.  "<a  class='btn btn-danger btn-xs' href='#' data-toggle='modal' onclick=ExcluirMusica(this.parentNode.parentNode.rowIndex) data-target='#delete-modal'>Excluir</a> </td>";
                    .  "<a  class='btn btn-danger btn-xs' href='#direcionar' onclick=Excluir('esconder')>Excluir</a> </td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "<div>";
                echo '<a class=" btn btn-primary btn-lg" onclick=MostrarDivEesconderExcluir("esconder2")>+ Adicionar Músicas</a>';
                echo '</div>';
                echo '<div id="esconder" style="display: none">';
                echo "<br>";
                echo '<a name="direcionar"></a>';
                echo "<h1 class='titulo' style='font-size: 30px; float:center; width: 200px; ' >";
                echo "Excluir Música?";
                echo "</h1>";
                $removermusica=mysql_query("SELECT *from musica WHERE id='$opcao'") or die("Impossível executar a query"); 
                $resultado = mysql_fetch_array($removermusica);
                echo $resultado["nome"];
                echo   "<p class='frm' style='width:90px; height:1px; float:left;'>Número</p>"
                   ."<p class='frm' style='width:270px;float:left; margin:0px;'>Título</p>"
                   ."<p class='frm' style='width:100px;float:left;'>Duração</p>"
                   ."<p class='frm' style='width:100px;float:left; margin:0px;'>Compositor</p>";
                
                echo '<div class="frm" style="float:left; width: 1000px;margin:0px; padding:0px; border:0px;">';
                echo '<input id="idexcluir" type="hidden" readonly="readonly"  name="idexcluir" style="width: 100px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" min="1" max="30">';
                
                echo '<input id="numeroexcluir" type="number" readonly="readonly" name="numeroexcluir" style="width: 100px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" min="1" max="30">';
                echo '<input  id="nomeexcluir" name="nomeexcluir" readonly="readonly" style="width: 270px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="text"  value=""/>';
                echo '<input  name="duracaoexcluir" style="width: 100px;float:left;" readonly="readonly" class="form-control mb-2 mr-sm-2 mb-sm-0" type="time" maxlength="5" value="" id="duracaoexcluir"/>';
                echo "<input  id='compositorexcluir' name='compositorexcluir' readonly='readonly' style='width: 200px;float:left;' class='form-control mb-2 mr-sm-2 mb-sm-0' type='text'  value='".$resultado['compositor']."'/>  ";
                         
                
                echo '    </div>';
                echo "<br><br><br>";
                echo '</div>';
                echo   "<div id='esconder2' style='display:none; margin:0px; padding:0px; border:0px;'>";
                echo "<br>";
                echo "<h1 id='inserirmusicabotao' class='titulo' style='font-size: 30px; float:center; width: 200px; ' >";
                echo "Inserir Música";
                echo "</h1>"
                . "<p class='frm' style='width:90px; height:1px; float:left;'>Número</p>"
                   ."<p class='frm' style='width:270px;float:left; margin:0px;'>Título</p>"
                   ."<p class='frm' style='width:100px;float:left; margin:0px;'>Duração</p>"
                   ."<p class='frm' style='width:100px;float:left; margin:0px;'>Compositor</p>";
                echo '<div class="frm" style="float:left; width: 1000px; margin:0px; padding:0px; border:0px;">';
                echo '<input id="numeroadicionar" type="number"  name="numero[]" style="width: 100px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" min="1" max="30">';
                echo '<input  id="nomeadicionar" name="nome[]" style="width: 270px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="text"  value=""/>';
                echo '<input  name="duracao[]" style="width: 100px;float:left;" class="form-control mb-2 mr-sm-2 mb-sm-0" type="time" maxlength="5" value="" id="duracaoadicionar"/>';
                echo "<input  id='compositoradicionar' name='compositor[]' style='width: 200px;float:left;' class='form-control mb-2 mr-sm-2 mb-sm-0' type='text'  value=''/>  "
                     . " ";
                echo '</div>';
                echo "<br><br><br>";
                echo    "</div>";
                echo    "<div class='frm'>";
                echo "<br><br><br>";
                echo    "<input class='btn btn-success btn-lg btn-default' type='submit' value='Salvar'/>";
                echo    "</div>";
                echo    "</form>";
            ?>
            <br>
            <a class="btn btn-warning btn-lg btn-default"  href="ListaAlbunsLogado.php">Voltar</a>
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
                      
                    <!-- Funcao para esconder div de inserir novas musicas-->
                    <script>
                    function Excluir(el) {
                    var display = document.getElementById(el).style.display;
                    var tohide = document.getElementById("esconder2").style.display;
                    var esconderbotao = document.getElementById("inserirmusicabotao").style.display;
                    document.getElementById('numeroadicionar').value='';
                    document.getElementById('nomeadicionar').value='';
                    document.getElementById('duracaoadicionar').value='';
                    document.getElementById('compositoradicionar').value='';
                    if(display === "none")
                        document.getElementById(el).style.display = 'block';
                    
                    if(tohide === "block"){
                        document.getElementById("esconder2").style.display = 'none';
                        document.getElementById("inserirmusicabotao").style.display = 'none';
                    }
                    }
                    
                    </script>
                    
                    <!-- Funcao para esconder div de excluir musicas-->
                    <script>
                    function MostrarDivEesconderExcluir(el) {
                    var display = document.getElementById(el).style.display;
                    var tohide = document.getElementById("esconder").style.display;
                    document.getElementById('idexcluir').value='';
                    document.getElementById('numeroexcluir').value='';
                    document.getElementById('nomeexcluir').value='';
                    document.getElementById('duracaoexcluir').value='';
                    document.getElementById('compositorexcluir').value='';
                    if(display === "none")
                        document.getElementById(el).style.display = 'block';
                        document.getElementById("inserirmusicabotao").style.display = 'block';
                    if(tohide === "block")
                        document.getElementById("esconder").style.display = 'none';
                    
                    
                    }
                    
                    </script>
                    
                    <!-- Funcao para pegar os valores na tabela da linha clicada para excluir a musica escolhida-->
                    <script>
                    $("#myTable tr").click(function(){
                    $(this).addClass('selected').siblings().removeClass('selected');
                    document.getElementById('idexcluir').value=$(this).find('td:nth(0)').html();
                    document.getElementById('numeroexcluir').value=$(this).find('td:nth(1)').html();
                    document.getElementById('nomeexcluir').value=$(this).find('td:nth(2)').html();
                    document.getElementById('duracaoexcluir').value=$(this).find('td:nth(3)').html();
                    document.getElementById('compositorexcluir').value=$(this).find('td:nth(4)').html();
                    });
                    </script>
                    
    </body>
</html>
