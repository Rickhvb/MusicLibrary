
<?php

class Operacoes{

    

    //Funçao que conecta com o banco e realiza a remoçao de um usuario

    public function removerUsuario( $table = null, $id = null ){

        $msg="";  

        try {

            if ($id) {

              $sql = "DELETE FROM " . $table . " WHERE id = " . $id;

              $result = $database->query($sql);

              

              if ($result = $database->query($sql)) {           

                $_SESSION['message'] = "Registro Removido com Sucesso.";

                $_SESSION['type'] = 'success';

                $msg="Registro Removido com Sucesso.";

              }

            }

          } catch (Exception $e) { 

            $msg="Erro ao excluir";

          }

          return $msg;

    }

    

    //Funçao que conecta com o banco e realiza o login de um usuario

    public function logarUsuario($email,$senha){

            $buscar=mysql_query("SELECT *FROM usuario WHERE email='$email' AND senha='$senha' AND nivel='2' LIMIT 1");

            if(mysql_num_rows($buscar)==1){

                $dados=mysql_fetch_array($buscar);

                $_SESSION["email"]=$dados["email"];

                $_SESSION["senha"]=$dados["senha"];

                $_SESSION["nivel"]=$dados["nivel"];

                $_SESSION["nome"]=$dados["nome"];

                setcookie("logado",1);

                $log=1;

            }

            if(isset($log)){

                $flash="Logado com sucesso!";

            }

            else{

                $flash="Usuário não encontrado.";

            }

            if($flash==""){

                $flash="Houve um erro!";

            }

        

        return $flash;

        }

        

        //Funçao que conecta com o banco e realiza o cadastro de um usuario com foto

        public function cadastrarUsuarioComFoto($nome,$email,$senha,$imagem){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $email= ucwords(strtolower($email));

        

        //Inserçao no banco de dados

        $validaremail=mysql_query("SELECT *FROM usuario WHERE email='$email'");

        $contar=mysql_num_rows($validaremail);

        if($contar==0){

            $insert=mysql_query("INSERT INTO usuario(nome,email,senha,nivel,imagem)VALUES"

        . "('$nome','$email','$senha',2,'$imagem')");

        }

        else{

            $flash="E-mail já cadastrado.";

        }

        if(isset($insert)){

                $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    //Funçao que conecta com o banco e realiza o cadastro de um usuario sem foto

            public function cadastrarUsuarioSemFoto($nome,$email,$senha){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $email= ucwords(strtolower($email));

        

        //Inserçao no banco de dados

        $validaremail=mysql_query("SELECT *FROM usuario WHERE email='$email'");

        $contar=mysql_num_rows($validaremail);

        if($contar==0){

            $insert=mysql_query("INSERT INTO usuario(nome,email,senha,nivel)VALUES"

        . "('$nome','$email','$senha',2)");

        }

        else{

            $flash="E-mail já cadastrado.";

        }

        if(isset($insert)){

                $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza o cadastro de um usuario com foto

    public function cadastrarUsuarioAdminComFoto($nome,$email,$senha,$imagem,$nivel){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $email= ucwords(strtolower($email));

        

        //Inserçao no banco de dados

        $validaremail=mysql_query("SELECT *FROM usuario WHERE email='$email'");

        $contar=mysql_num_rows($validaremail);

        if($contar==0){

            $insert=mysql_query("INSERT INTO usuario(nome,email,senha,nivel,imagem)VALUES"

        . "('$nome','$email','$senha','$nivel','$imagem')");

        }

        else{

            $flash="E-mail já cadastrado.";

        }

        if(isset($insert)){

                $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza o cadastro de um usuario sem foto

        public function cadastrarUsuarioAdminSemFoto($nome,$email,$senha,$nivel){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $email= ucwords(strtolower($email));

        

        //Inserçao no banco de dados

        $validaremail=mysql_query("SELECT *FROM usuario WHERE email='$email'");

        $contar=mysql_num_rows($validaremail);

        if($contar==0){

            $insert=mysql_query("INSERT INTO usuario(nome,email,senha,nivel)VALUES"

        . "('$nome','$email','$senha','$nivel')");

        }

        else{

            $flash="E-mail já cadastrado.";

        }

        if(isset($insert)){

                $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza a alteraçao de um usuario com foto

    public function editarUsuarioComFoto($id,$nome,$email,$senha,$imagem,$nivel){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $email= ucwords(strtolower($email));

        

        //Inserçao no banco de dados

        $validaremail=mysql_query("SELECT *FROM usuario WHERE email='$email'");

        $resultado=mysql_fetch_array($validaremail);

        $contar=mysql_num_rows($validaremail);

        if(($resultado["ID"]==$id && $contar>0)||$contar==0){

            $insert=mysql_query("UPDATE usuario SET nome='$nome',email='$email',senha='$senha',nivel='$nivel',imagem='$imagem' WHERE id='$id'");

        }

        else{

            $flash="E-mail já cadastrado.";

        }

        if(isset($insert)){

                $flash="Usuário atualizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza a alteraçao de um usuario sem foto

        public function editarUsuarioSemFoto($id,$nome,$email,$senha,$nivel){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $email= ucwords(strtolower($email));

        

        //Inserçao no banco de dados

        $validaremail=mysql_query("SELECT *FROM usuario WHERE email='$email'");

        $resultado=mysql_fetch_array($validaremail);

        $contar=mysql_num_rows($validaremail);

        if(($resultado["ID"]==$id && $contar>0)||$contar==0){

            $insert=mysql_query("UPDATE usuario SET nome='$nome',email='$email',senha='$senha',nivel='$nivel' WHERE id='$id'");

        }

        else{

            $flash="E-mail já cadastrado.";

        }

        if(isset($insert)){

                $flash="Usuário atualizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    

    //Funçao que conecta com o banco e realiza a alteraçao de um artista com foto

        public function atualizarArtistaComFoto($id,$nome,$genero,$descricao,$imagem){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $insert=mysql_query("UPDATE artista SET nome='$nome',genero='$genero',descricao='$descricao',imagem='$imagem' WHERE id='$id'");

        

        if(isset($insert)){

                $flash="Artista atualizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza a alteraçao de um artista sem foto

            public function atualizarArtistaSemFoto($id,$nome,$genero,$descricao){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        $insert=mysql_query("UPDATE artista SET nome='$nome',genero='$genero',descricao='$descricao' WHERE id='$id'");

        

        if(isset($insert)){

                $flash="Artista atualizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza o cadastro de um artista com foto

    public function cadastrarArtistaComFoto($nome,$genero,$descricao,$imagem){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        //Inserçao no banco de dados

        $validarnome=mysql_query("SELECT *FROM artista WHERE nome='$nome'");

        $contar=mysql_num_rows($validarnome);

        if($contar==0){

            $insert=mysql_query("INSERT INTO artista(nome,genero,descricao,imagem)VALUES"

        . "('$nome','$genero','$descricao','$imagem')");

        }

        else{

            $flash="Artista já cadastrado.";

        }

        if(isset($insert)){

                $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza o cadastro de um artista sem foto

        public function cadastrarArtistaSemFoto($nome,$genero,$descricao){

        //Tratamento das variáveis

        $nome=ucwords(strtolower($nome));

        //Inserçao no banco de dados

        $validarnome=mysql_query("SELECT *FROM artista WHERE nome='$nome'");

        $contar=mysql_num_rows($validarnome);

        if($contar==0){

            $insert=mysql_query("INSERT INTO artista(nome,genero,descricao)VALUES"

        . "('$nome','$genero','$descricao')");

        }

        else{

            $flash="Artista já cadastrado.";

        }

        if(isset($insert)){

                $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!";

            }

        }

        return $flash;

    }

    

    

    //Funçao que conecta com o banco e realiza o cadastro de um album com capa

    public function cadastrarAlbumComCapa($album,$artista,$ano,$imagem){

        //Inserçao no banco de dados

        $busca=mysql_query("SELECT *FROM artista WHERE nome='$artista'");

        if(mysql_num_rows($busca)>0){

            $dados=mysql_fetch_array($busca);

            $artistainserir = $dados["ID"];

            try{

                $insert=mysql_query("INSERT INTO album (nome,ano,artista,imagem) VALUES "

                    . "('$album','$ano','$artistainserir','$imagem')");

            $procuraidalbum = mysql_query("SELECT MAX(ID) FROM album");

            $resultado=mysql_fetch_array($procuraidalbum);

            $idalbum=$resultado["MAX(ID)"];

            $conectar=new Operacoes;

            $conectar=$conectar->cadastrarMusica($idalbum);

            }catch(Exception $e){

            

        }}

        else{

            $flash="Artista não encontrado.";

        }

        if(isset($insert)){

            $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza o cadastro de um album sem capa

        public function cadastrarAlbumSemCapa($album,$artista,$ano){

        //Inserçao no banco de dados

        $busca=mysql_query("SELECT *FROM artista WHERE nome='$artista'");

        if(mysql_num_rows($busca)>0){

            $dados=mysql_fetch_array($busca);

            $artistainserir = $dados["ID"];

            try{

                $insert=mysql_query("INSERT INTO album (nome,ano,artista) VALUES "

                    . "('$album','$ano','$artistainserir')");

            $procuraidalbum = mysql_query("SELECT MAX(ID) FROM album");

            $resultado=mysql_fetch_array($procuraidalbum);

            $idalbum=$resultado["MAX(ID)"];

            $conectar=new Operacoes;

            $conectar=$conectar->cadastrarMusica($idalbum);

            }catch(Exception $e){

            

        }}

        else{

            $flash="Artista não encontrado.";

        }

        if(isset($insert)){

            $flash="Cadastro realizado com sucesso!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza a alteraçao de um album com capa

    public function editarAlbumComCapa($id,$album,$artista,$ano,$imagem){

        //Inserçao no banco de dados

        $buscaartista=mysql_query("SELECT *FROM artista WHERE nome='$artista'");

        $buscaalbum=mysql_query("SELECT *FROM album WHERE id='$id'");

        if(mysql_num_rows($buscaalbum)>0){

        if(mysql_num_rows($buscaartista)>0){

            $dadosartista=mysql_fetch_array($buscaartista);

            $artistainserir = $dadosartista["ID"];

            $dadosalbum=mysql_fetch_array($buscaalbum);

            $idalbum = $dadosalbum["ID"];

            try{

                $insert=mysql_query(""

                        . "UPDATE album SET nome='$album', ano='$ano',artista='$artistainserir',imagem='$imagem'"

                        . "WHERE id='$idalbum'");

            }catch(Exception $e){

            

        }}

        else{

            $flash="Artista não encontrado.";

        }}

        else{

            $flash="Álbum não encontrado.";

        }

        if(isset($insert)){

            $flash="Álbum atualizado!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

    

    //Funçao que conecta com o banco e realiza a alteraçao de um album sem capa

    public function editarAlbumSemCapa($id,$album,$artista,$ano){

        //Inserçao no banco de dados

        $buscaartista=mysql_query("SELECT *FROM artista WHERE nome='$artista'");

        $buscaalbum=mysql_query("SELECT *FROM album WHERE id='$id'");

        if(mysql_num_rows($buscaalbum)>0){

        if(mysql_num_rows($buscaartista)>0){

            $dadosartista=mysql_fetch_array($buscaartista);

            $artistainserir = $dadosartista["ID"];

            $dadosalbum=mysql_fetch_array($buscaalbum);

            $idalbum = $dadosalbum["ID"];

            try{

                $insert=mysql_query(""

                        . "UPDATE album SET nome='$album', ano='$ano',artista='$artistainserir'"

                        . "WHERE id='$idalbum'");

            }catch(Exception $e){

            

        }}

        else{

            $flash="Artista não encontrado.";

        }}

        else{

            $flash="Álbum não encontrado.";

        }

        if(isset($insert)){

            $flash="Álbum atualizado!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

    

    //Funçao que conecta com o banco e remove um album 

    public function removerAlbum($album){

        try{

            $insert=mysql_query("DELETE FROM album WHERE id='$album'");

            }

            catch(Exception $e){

            

        }

        if(isset($insert)){

            $flash="Album removido!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

    

    //Funçao que conecta com o banco e exclui um usuário

     public function excluirUsuario($usuario){

        try{

            $insert=mysql_query("DELETE FROM usuario WHERE id='$usuario'");

            }

            catch(Exception $e){

            

        }

        if(isset($insert)){

            $flash="Usuário removido!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    } 

    

    

    //Funçao que conecta com o banco e exclui um artista

    public function removerArtista($artista){

        try{

            $insert=mysql_query("DELETE FROM artista WHERE id='$artista'");

            }

            catch(Exception $e){

            

        }

        if(isset($insert)){

            $flash="Artista removido!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

    

    //Funçao que conecta com o banco e cadastra uma música

    public function cadastrarMusica($idalbum){ 

        try{

            $sql = "INSERT INTO musica (numero,nome,duracao,compositor,album) VALUES";

            $data = $_POST;

            foreach( $data['numero'] as $k => $v ){

            $sql .= PHP_EOL . "('" . $v . "','" . $data['nome'][$k] . "','00:" . $data['duracao'][$k] . "','" . $data['compositor'][$k] . "','" . $idalbum . "')";

            $sql .= ",";

            }

            $sql = substr_replace($sql, ';', -1);

            mysql_query($sql);

            }catch(Exception $e){

            

        }

    }

    

    //Funçao que conecta com o banco e cadastra uma música

        public function inserirMusica($id){ 

        try{

            $sql = "INSERT INTO musica (numero,nome,duracao,compositor,album) VALUES";

            $data = $_POST;

            foreach( $data['numero'] as $k => $v ){

            $sql .= PHP_EOL . "('" . $v . "','" . $data['nome'][$k] . "','00:" . $data['duracao'][$k] . "','" . $data['compositor'][$k] . "','" . $id . "')";

            $sql .= ",";

            }

            $sql = substr_replace($sql, ';', -1);

            mysql_query($sql);

            }catch(Exception $e){

            

        }

    }

    

    //Funçao que conecta com o banco e exclui uma música

        public function excluirMusica($musicaexcluir){ 

        try{

            $sql = "DELETE FROM musica WHERE id='$musicaexcluir'";

            mysql_query($sql);

            }catch(Exception $e){

            

        }

        if(isset($sql)){

            $flash="Música removida!";

        }else{

            if($flash==""){

                $flash="Houve um erro!"; } }

        return $flash;

    }

  

    

    //Funçao que conecta com o banco e loga o usuário no sistema

    public function logarAdmin($email,$senha){

            $buscar=mysql_query("SELECT *FROM usuario WHERE email='$email' AND senha='$senha' AND nivel='1' LIMIT 1");

            if(mysql_num_rows($buscar)==1){

                $dados=mysql_fetch_array($buscar);

                $_SESSION["email"]=$dados["email"];

                $_SESSION["senha"]=$dados["senha"];

                $_SESSION["nivel"]=$dados["nivel"];

                $_SESSION["nome"]=$dados["nome"];

                setcookie("logado",1);

                $log=1;

            }

            if(isset($log)){

                $flash="Logado com sucesso!";

            }

            else{

                $flash="Admin não encontrado.";

            }

            if($flash==""){

                $flash="Houve um erro!";

            }

        

        return $flash;

        }

    

    

}