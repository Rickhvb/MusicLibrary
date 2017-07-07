<?php

//Realiza a conexao com a banco de dados
class BancoDados{
    public function conectar(){
        $host="localhost";
        $user="root";
        $pass="123";
        $dbname="musiclibrary";
        
        $conexao=mysql_connect($host,$user,$pass);
        $selectdb=mysql_select_db($dbname);
        
        return $conexao;
                
    }
}



