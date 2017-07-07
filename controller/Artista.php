<?php 

//Cadastra um artista
 if($startaction==1 && $acao=="cadastrarArtista"){
        $nome=$_POST["nome"];
        $genero=$_POST["genero"];
        $descricao=$_POST["descricao"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        if(empty($nome) || empty($genero) || empty($descricao)){
            $msg="Nome do Artista/Banda, Gênero e Descrição são obrigatórios!";
        }
        //Todos os campos preenchidos
        else{
            if (!empty($imagem)){
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectar=$conectar->cadastrarArtistaComFoto($nome,$genero,$descricao,$imagem);
                $msg = $conectar;
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                    $message="Imagem salva.";
                }else{
                    $message="Imagem nao foi salva.";
                }
            }
            else{
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectar=$conectar->cadastrarArtistaSemFoto($nome,$genero,$descricao);
                $msg = $conectar;
            }
        }
}

//Atualiza um artista
 if($startaction==1 && $acao=="atualizarArtista"){
        $nome=$_POST["nome"];
        $genero=$_POST["genero"];
        $id=$_POST["id"];
        $descricao=$_POST["descricao"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        if(empty($nome) || empty($genero) || empty($descricao)){
            $msg="Nome do Artista/Banda, Gênero e Descrição são obrigatórios!";
        }
        //Todos os campos preenchidos
        else{
            if (!empty($imagem)){
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectar=$conectar->atualizarArtistaComFoto($id,$nome,$genero,$descricao,$imagem);
                $msg = $conectar;
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                    $message="Imagem salva.";
                }else{
                    $message="Imagem nao foi salva.";
                }
            }
            else{
                //Executa a classe cadastro
                $conectar=new Operacoes;
                $conectar=$conectar->atualizarArtistaSemFoto($id,$nome,$genero,$descricao);
                $msg = $conectar;
            }
        }
}

//Exclui um artista
 if($startaction==1 && $acao=="removerArtista"){
        $artista=$_POST["id"];
        $conectar=new Operacoes;
        $conectar=$conectar->removerArtista($artista);
        $msg = $conectar;
}