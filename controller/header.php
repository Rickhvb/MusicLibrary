<?php

//Starts
ob_start();
session_start();

//Globais
include("controller/Globais.php");

//Classes
include("controller/BancoDados.class.php");
include("controller/Operacoes.class.php");

//Conexao com banco de dados
$conectar=new BancoDados;
$conectar=$conectar->conectar();

//Include dos métodos
include("controller/Usuario.php");
include("controller/Artista.php");
include("controller/Album.php");






