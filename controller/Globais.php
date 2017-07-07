<?php

//Variáveis globai que inicializam com o sistema
$home="http://localhost/MusicLibrary";
$title="Music Lab";
$startaction="";
$msg="";
$nivel="publico";
$acao="";
$opcao="";
$exibicao="";
$nivel="";
$idartista="";
if(isset($_GET["acao"])){
    $acao=$_GET["acao"];
    $startaction=1;
}

