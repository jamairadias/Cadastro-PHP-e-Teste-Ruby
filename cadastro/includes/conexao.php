<?php
$servidorBD = 'localhost';
$usuarioBD = 'root';
$senhaBD = '';
$BD = 'cadastro';

$link = mysqli_connect($servidorBD, $usuarioBD, $senhaBD);
$SelecionaBD = mysqli_select_db($link, $BD);

if (!$link){
    die("Falha na conex�o: " . mysqli_connect_erro());
}else{
    //echo "Conex�o realizada com sucesso";
}


?>