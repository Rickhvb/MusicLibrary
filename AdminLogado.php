<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <nav id="menu">
            <ul>
                <li><a href="Cadastro.php">Cadastro</a></li>
                <li><a href="LoginAdmin.php">Admin</a></li>
                <li><a href="LoginUser.php">Login</a></li>
                <li><a href="index.php">Logoff</a></li>
            </ul>
        </nav>
        <?php
            echo "Inicio"
        ?>
        <p><a href="ListaArtistas.php">Listar Artistas</a></p>
        <p><a href="ListaMusicas.php">Listar Músicas</a></p>
        <p><a href="ListaAlbuns.php">Listar Álbuns</a></p>
        <p><a href="InserirAlbum.php">Inserir Álbum</a></p>
        <p><a href="InserirArtista.php">Inserir Artista</a></p>
        <p><a href="ListaUsuarios.php">Listar Usuários</a></p>
        
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>