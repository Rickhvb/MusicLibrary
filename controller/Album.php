<?php 
//Cadastra um novo álbum
 if($startaction==1 && $acao=="cadastrarAlbum"){
        $album=$_POST["album"];
        $artista=$_POST["artista"];
        $ano=$_POST["ano"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        if(empty($album) || empty($artista) || $ano=="Selecione..."|| $artista=="Selecione..."){
            $msg="Nome do Álbum, Nome do Artista/Banda e Ano são obrigatórios!";
        }
        //Todos os campos preenchidos
        else{
            if (!empty($imagem)){
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectar=$conectar->cadastrarAlbumComCapa($album,$artista,$ano,$imagem);
                $msg = $conectar;
                echo '<script>';
                echo 'alert("Álbum Cadastrado com Sucesso!");';
                echo 'window.location="ListaAlbunsLogado.php";';
                echo '</script>';
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                    $message="Imagem salva.";
                }else{
                    $message="Imagem nao foi salva.";
                }
            }
            else{
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectar=$conectar->cadastrarAlbumSemCapa($album,$artista,$ano);
                $msg = $conectar;
                echo '<script>';
                echo 'alert("Álbum Cadastrado com Sucesso!");';
                echo 'window.location="ListaAlbunsLogado.php";';
                echo '</script>';
            }
        }
}

//Remove um álbum   
if( $startaction==1 && $acao=="removeralbum"){
        $album=$_POST["id"];
        $conectar=new Operacoes;
        $conectar=$conectar->removerAlbum($album);
        $msg = $conectar;
        echo '<script>';
        echo 'alert("Álbum removido com Sucesso!");';
        echo 'window.location="ListaAlbunsLogado.php";';
        echo '</script>';
        
}

//Atualiza um álbum
 if($startaction==1 && $acao=="atualizarAlbum"){
        $album=$_POST["album"];
        $artista=$_POST["artista"];
        $ano=$_POST["ano"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        $id=$_POST["id"];
        $musicaexcluir=$_POST["idexcluir"];
        if(empty($album) || empty($artista) || $ano=="Selecione..."){
            $acao=$id;
            $msg="Nome do Álbum, Nome do Artista/Banda e Ano são obrigatórios!";
            
        }
        else{
        $musica=$_POST["numero"];
        $conectar=new Operacoes;
        $conectar=$conectar->procurarmusicas($id,$musica);
        if ($conectar != 1){
        //Todos os campos preenchidos
        
            if (!empty($imagem)){
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectarmusica=new Operacoes;
                $conectarmusicaexcluir=new Operacoes;
                $conectarmusica=$conectarmusica->inserirMusica($id);
                $conectarmusicaexcluir=$conectarmusicaexcluir->excluirMusica($musicaexcluir);
                $conectar=$conectar->editarAlbumComCapa($id,$album,$artista,$ano,$imagem);
                $msg = $conectar;
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                    $message="Imagem salva.";
                }else{
                    $message="Imagem nao foi salva.";
                }
                $acao=$id;
            }
            else{
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectarmusica=new Operacoes;
                $conectarmusicaexcluir=new Operacoes;
                $conectarmusica=$conectarmusica->inserirMusica($id);
                $conectarmusicaexcluir=$conectarmusicaexcluir->excluirMusica($musicaexcluir);
                $conectar=$conectar->editarAlbumSemCapa($id,$album,$artista,$ano);
                $msg = $conectar;
                $acao=$id;
            }
        
        }else{
            $acao=$id;
            $msg="Número das músicas devem ser diferentes!";
            
        }
        }
}

