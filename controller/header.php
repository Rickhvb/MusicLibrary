<?php

//Starts
ob_start();
session_start();

//Globais
include("controller/Globais.php");

//Classes
<<<<<<< HEAD
include("controller/BancoDados.class.php");
include("controller/Operacoes.class.php");

//Conexao com banco de dados
$conectar=new BancoDados;
=======
include("controller/DB.class.php");
include("controller/Operacoes.class.php");

//Conexao com banco de dados
$conectar=new DB;
>>>>>>> e4b48a3aed76faa29ac9e1a873ad8ef17a1faabe
$conectar=$conectar->conectar();

//Include dos métodos
include("controller/Usuario.php");
include("controller/Artista.php");
include("controller/Album.php");






