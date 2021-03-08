<?php 
    session_start();
   
        include_once("includes/conexao.php");
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $erro = false;

        $dados_st = array_map('strip_tags', $dados_rc);
        $dados = array_map('trim', $dados_st);

        if(in_array('', $dados)){
            $erro = true;
            $_SESSION['msg'] = "<p style='color:red;'>Necessário preencher todos os campos. </p>";
            header("Location: usuarios.php");
 
        }
        else{
            $result_usuario = "SELECT id FROM usuarios WHERE nome = '". $dados['nome'] ."' AND email = '". $dados['email'] ."'";
            $resultado_usuario = mysqli_query($link, $result_usuario);
            if(($resultado_usuario) && ($resultado_usuario->num_rows != 0)){
                $erro = true;
                $_SESSION['msg'] = "<p style='color:red;'>'Usuário já cadastrado.</p>";
                header("Location: usuarios.php");

            }
            
 
        }

        if(!$erro){
            $result_usuario = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
            $resultado_usuario = mysqli_query($link, $result_usuario);
        
            if (mysqli_insert_id($link)){
                $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
                header("Location: listaDeUsuarios.php");
        
            }else{
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar usuário.</p>";
                header("Location: usuarios.php");
        
            }

        }
        

    
   
?>