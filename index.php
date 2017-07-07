<?php
//Pagina principal, que gerencia qual usuário está logado
include("controller/header.php");
if(isset($logado)){
    if($nivel=="admin"){
        include("AdminLogado.php");
    }else if($nivel=="usuario"){
        include("UsuarioLogado.php");
    }else{
        include("Home.php");
    }
}
else{
    include("Home.php");
}

