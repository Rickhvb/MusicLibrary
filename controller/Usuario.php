
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
                            if ($msg == "Cadastro realizado com sucesso!"){
                            echo '<script>';
                            echo 'alert("Usuário Cadastrado com Sucesso!\nFaça seu login!");';
                            echo 'window.location="index.php";';
                            echo '</script>';
                        }

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
                            if ($msg == "Cadastro realizado com sucesso!"){
                            echo '<script>';
                            echo 'alert("Usuário Cadastrado com Sucesso!\nFaça seu login!");';
                            echo 'window.location="index.php";';
                            echo '</script>';
                        }

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

                        if ($nivel=="Administrador"){

                            $nivel=1;

                        }else if ($nivel=="Usuário Comum"){

                            $nivel=2;

                        }

                        if (!empty($imagem)){

                        $conectar=$conectar->cadastrarUsuarioAdminComFoto($nome,$email,$senha,$imagem,$nivel);
                        $msg = $conectar;
                        if ($msg == "Cadastro realizado com sucesso!"){
                            echo '<script>';
                            echo 'alert("Usuário Cadastrado com Sucesso!");';
                            echo 'window.location="ListaUsuarios.php";';
                            echo '</script>';
                        }
                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){

                            $message="Imagem salva.";

                        }else{

                            $message="Imagem nao foi salva.";

                        }

                        }

                        else{

                            $conectar=$conectar->cadastrarUsuarioAdminSemFoto($nome,$email,$senha,$nivel);
                            $msg = $conectar;
                            if ($msg == "Cadastro realizado com sucesso!"){
                                echo '<script>';
                                echo 'alert("Usuário Cadastrado com Sucesso!");';
                                echo 'window.location="ListaUsuarios.php";';
                                echo '</script>';
                        }

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

    if($_SESSION["nivel"]==1 || $_SESSION["nivel"]==0){

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
            $acao=$id;
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
                        $acao=$id;
                        $msg="Senha deve ter no mínimo 4 caracteres!";

                    }

                    //Senha válida

                    else{

                        //Executa a classe cadastro

                        $conectar=new Operacoes;

                        if ($nivel==="Administrador"){

                            $nivel=1;

                        }else{

                            $nivel=2;

                        }

                        if (!empty($imagem)){
                        $idusuario = $_SESSION["id"];
                        $conectar=new Operacoes;
                        if ($id==$idusuario && $nivel == 2){
                            $conectar=$conectar->editarUsuarioComFoto($id,$nome,$email,$senha,$imagem,$nivel);
                            $msg = $conectar;
                            if ($msg == "Usuário atualizado com sucesso!"){
                                echo '<script>';
                                echo 'alert("Usuário atualizado com Sucesso!");';
                                echo 'window.location="index.php?acao=logout";';
                                echo '</script>';
                            }else {
                                $acao=$id;
                            }
                           
                        }else{
                           $conectar=$conectar->editarUsuarioComFoto($id,$nome,$email,$senha,$imagem,$nivel);
                           $msg = $conectar;
                            if ($msg == "Usuário atualizado com sucesso!"){
                                echo '<script>';
                                echo 'alert("Usuário atualizado com Sucesso!");';
                                echo 'window.location="ListaUsuarios.php";';
                                echo '</script>';
                            }else {
                                $acao=$id;
                            }
                           
                        }
                        
                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){

                            $message="Imagem salva.";

                        }else{

                            $message="Imagem nao foi salva.";

                        }

                        }

                        else{
                            $idusuario = $_SESSION["id"];
                            $conectar=new Operacoes;
                            if ($id==$idusuario && $nivel == 2){
                                $conectar=$conectar->editarUsuarioSemFoto($id,$nome,$email,$senha,$nivel);
                                $msg = $conectar;
                                if ($msg == "Usuário atualizado com sucesso!"){
                                    echo '<script>';
                                    echo 'alert("Usuário atualizado com Sucesso!");';
                                    echo 'window.location="index.php?acao=logout";';
                                    echo '</script>';
                                }else {
                                    $acao=$id;
                            }
                            }else{
                               $conectar=$conectar->editarUsuarioSemFoto($id,$nome,$email,$senha,$nivel);
                               $msg = $conectar;
                               if ($msg == "Usuário atualizado com sucesso!"){
                                    echo '<script>';
                                    echo 'alert("Usuário atualizado com Sucesso!");';
                                    echo 'window.location="ListaUsuarios.php";';
                                    echo '</script>';
                                }else {
                                    $acao=$id;
                                }
                            }

                        }

                    }

                }

                //Senhas diferentes

                else{
                    $acao=$id;
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
        $idusuario = $_SESSION["id"];
        $usuario=$_POST["id"];
        $conectar=new Operacoes;
        if ($usuario==$idusuario){
            $conectar=$conectar->excluirUsuario($usuario);
            echo '<script>';
            echo 'alert("Usuário removido com Sucesso!");';
            echo 'window.location="index.php?acao=logout";';
            echo '</script>';
        }else{
           $conectar=$conectar->excluirUsuario($usuario); 
           echo '<script>';
           echo 'alert("Usuário removido com Sucesso!");';
           echo 'window.location="ListaUsuarios.php";';
           echo '</script>';
        }
        
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

        unset($_SESSION["email"],$_SESSION["senha"],$_SESSION["nivel"],$_SESSION["nome"], $_SESSION["id"]);

        header("Location:index.php");

}
