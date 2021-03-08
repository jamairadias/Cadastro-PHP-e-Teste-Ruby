<?php
    session_start();
    include_once("inc/head.php");
    include_once("inc/header.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $title = "Cadastro de Usuários"; ?>
    
    <div class="container pt-3">
        <h1>Cadastro de Usuários</h1>
        <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        ?>
       
        <p>Preencha o formulário para cadastrar-se na plataforma.</p>
        <form method="POST" action="processa.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" require>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" require>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>     
           
    </div>
</body>
</html>