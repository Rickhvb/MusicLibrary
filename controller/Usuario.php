<?php 

//Usuário que realiza um novo cadastro
 if($startaction==1 && $acao=="cadastrar"){
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $senha2=$_POST["senha2"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        if(empty($nome) || empty($email) || empty($senha)){
            $msg="Nome, E-mail e Senha são obrigatórios!";
        }
        //Todos os campos preenchidos
        else{
            //Email válido
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                //Senhas iguais
                if($senha==$senha2){
                    //Senha inválida
                    if(strlen($senha)<4){
                        $msg="Senha deve ter no mínimo 4 caracteres!";
                    }
                    //Senha válida
                    else{
                        //Executa a classe cadastro
                        if (!empty($imagem)){
                        //Executa a classe cadastro
                        $conectar=new Operacoes;
                        $conectar=$conectar->cadastrarUsuarioComFoto($nome,$email,$senha,$imagem);
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
                        $conectar=$conectar->cadastrarUsuarioSemFoto($nome,$email,$senha);
                        $msg = $conectar;
                    }
                    }
                }
                //Senhas diferentes
                else{
                    $msg="As senhas devem ser iguais!";
                }
            }
            //Email inválido
            else{
                $msg="Digite o e-mail corretamente!";
            }
        }
}

//Administrador que cadastra um novo usuário
if($startaction==1 && $acao=="cadastrarUsuario"){
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $senha2=$_POST["senha2"];
        $nivel=$_POST["nivel"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        if(empty($nome) || empty($email) || empty($senha)){
            $msg="Nome, E-mail e Senha são obrigatórios!";
        }
        //Todos os campos preenchidos
        else{
            //Email válido
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                //Senhas iguais
                if($senha==$senha2){
                    //Senha inválida
                    if(strlen($senha)<4){
                        $msg="Senha deve ter no mínimo 4 caracteres!";
                    }
                    //Senha válida
                    else{
                        //Executa a classe cadastro
                        $conectar=new Operacoes;
                        if ($nivel="Administrador"){
                            $nivel=1;
                        }else{
                            $nivel=2;
                        }
                        if (!empty($imagem)){
                        $conectar=$conectar->cadastrarUsuarioAdminComFoto($nome,$email,$senha,$imagem,$nivel);
                        $msg = $conectar;
                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                            $message="Imagem salva.";
                        }else{
                            $message="Imagem nao foi salva.";
                        }
                        }
                        else{
                            $conectar=$conectar->cadastrarUsuarioAdminSemFoto($nome,$email,$senha,$nivel);
                            $msg = $conectar;
                        }
                    }
                }
                //Senhas diferentes
                else{
                    $msg="As senhas devem ser iguais!";
                }
            }
            //Email inválido
            else{
                $msg="Digite o e-mail corretamente!";
            }
        }
}

//Realiza a verificaçao de quem está logado
if(isset($_SESSION["nome"])){
    $logado=1;
    $exibicao=$_SESSION["nome"];
    if($_SESSION["nivel"]==1){
        $nivel="admin";
    }else if ($_SESSION["nivel"]==2){
        $nivel="usuario";
    }
}
else{
    $nivel="publico";
    $exibicao="Visitante";
}

//Edita um usuário
 if($startaction==1 && $acao=="editarUsuario"){
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $nivel=$_POST["nivel"];
        $senha2=$_POST["senha2"];
        $id=$_POST["id"];
        $target = "img/".basename($_FILES['imagem']['name']);
        $imagem = $_FILES['imagem']['name'];
        if(empty($nome) || empty($email) || empty($senha) || empty($nivel)){
            $msg="Nome, E-mail e Senha são obrigatórios!";
        }
        //Todos os campos preenchidos
        else{
            //Email válido
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                //Senhas iguais
                if($senha==$senha2){
                    //Senha inválida
                    if(strlen($senha)<4){
                        $msg="Senha deve ter no mínimo 4 caracteres!";
                    }
                    //Senha válida
                    else{
                        //Executa a classe cadastro
                        $conectar=new Operacoes;
<<<<<<< HEAD
                        if ($nivel==="Administrador"){
=======
                        if ($nivel="Administrador"){
>>>>>>> e4b48a3aed76faa29ac9e1a873ad8ef17a1faabe
                            $nivel=1;
                        }else{
                            $nivel=2;
                        }
                        if (!empty($imagem)){
                        $conectar=$conectar->editarUsuarioComFoto($id,$nome,$email,$senha,$imagem,$nivel);
                        $msg = $conectar;
                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                            $message="Imagem salva.";
                        }else{
                            $message="Imagem nao foi salva.";
                        }
                        }
                        else{
                            $conectar=$conectar->editarUsuarioSemFoto($id,$nome,$email,$senha,$nivel);
                            $msg = $conectar;
                        }
                    }
                }
                //Senhas diferentes
                else{
                    $msg="As senhas devem ser iguais!";
                }
            }
            //Email inválido
            else{
                $msg="Digite o e-mail corretamente!";
            }
        }
}

//Remove um usuário
$usuario=null;
 if($startaction==1 && $acao=="excluir"){
        $operacao=new Operacoes;
        $idExcluir = $_POST["ID"];
        $operacao=$operacao->removerUsuario('usuario', $idExcluir);
        $msg = $operacao;
        if($msg=="Registro Removido com Sucesso."){
          header('location: ListaUsuarios.php');
        }
 }
 
 //Remove um usuário
 if($startaction==1 && $acao=="removerUsuario"){
        $usuario=$_POST["id"];
        $conectar=new Operacoes;
        $conectar=$conectar->excluirUsuario($usuario);
        $msg = $conectar;
}
 

//Realiza login de um usuário
 if($startaction==1 && $acao=="logarUsuario"){
        //Dados
        $email=addslashes($_POST["email"]);
        $senha=addslashes($_POST["senha"]);
        
        if(empty($email)||empty($senha)){
            $msg="Preencha todos os campos!";
        }
        else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $msg="Digite seu e-mail corretamente!";
            }else{
                //Executa a busca pelo usuario
                $login=new Operacoes;
                $login=$login->logarUsuario($email,$senha);
                $msg = $login;
                if($msg=="Logado com sucesso!"){
                    header("Location:index.php");
                }
            }
        }
}

//Realiza login de um administrador
 if($startaction==1 && $acao=="logarAdmin"){
        //Dados
        $email=addslashes($_POST["email"]);
        $senha=addslashes($_POST["senha"]);
        
        if(empty($email)||empty($senha)){
            $msg="Preencha todos os campos!";
        }
        else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $msg="Digite seu e-mail corretamente!";
            }else{
                //Executa a busca pelo usuario
                $login=new Operacoes;
                $login=$login->logarAdmin($email,$senha);
                $msg = $login;
                if($msg=="Logado com sucesso!"){
                    header("Location:index.php");
                }
            }
        }
}

//Realiza o logout do usuário/admin
 if($startaction==1 && $acao=="logout"){
        setcookie("logado","");
        unset($_SESSION["email"],$_SESSION["senha"],$_SESSION["nivel"],$_SESSION["nome"]);
        header("Location:index.php");
}