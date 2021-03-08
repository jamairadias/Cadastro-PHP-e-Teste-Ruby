<?php
    session_start();
    include_once("includes/conexao.php");
    include_once("inc/head.php");
    include_once("inc/header.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $title = "Lista de Usuários"; ?>
    
    
<body>
    <a href="usuarios.php">Cadastro de Usuários</a>
    <div class="container pt-3">
        <h1>Lista de Usuários Cadastrados</h1>
        <p>Abaixo estamos listando todos usuários cadastrados em nossa plataforma.</p>
        <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantidade de itens por página
        $qnt_result_pg = 30;

        //Calcular o iní­cio da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


        $result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
        $resultado_usuarios = mysqli_query($link, $result_usuarios);
        while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
            echo "ID: " . $row_usuario['id'] . "<br>";
            echo "NOME: " . $row_usuario['nome'] . "<br>";
            echo "E-MAIL: " . $row_usuario['email'] . "<br><hr>";
        }

        //Paginação  - Somar a quantidade de usuários cadastrados
        $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
        $resultado_pg = mysqli_query($link, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        //echo $row_pg['num_result'];

        //Quantidade de páginas
        $quantidade_pg = ceil ($row_pg['num_result'] / $qnt_result_pg);

        //Limitar os links antes e depois
        $max_links = 2;

        echo "<a href= 'listaDeUsuarios.php?pagina=1'>Primeira</a>";

        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++){
            if($pag_ant >= 1){
                echo "<a href= 'listaDeUsuarios.php?pagina=$pag_ant'>$pag_ant</a>"; 
            }
            
        }
        echo "$pagina";
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                echo "<a href= 'listaDeUsuarios.php?pagina=$pag_dep'>$pag_dep</a>"; 
            }
            
        }
        echo "<a href= 'listaDeUsuarios.php?pagina=$quantidade_pg'>Última</a>"; 

        ?>
        
</body>
</html>