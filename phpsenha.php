<?php

$usuario_correto = "gabby";
$senha_correta = "gabby1234";
 
$usuario = $_POST['usuario'];
$senha_digitada = $_POST['senha'];
 
$senha_invertida = strrev($senha_correta);
 
if ($usuario == $usuario_correto && $senha_digitada == $senha_invertida) {
    echo "<h2>Login bem-sucedido!</h2>";
    echo "<p>Bem-vindo(a), $usuario!</p>";
} else {
    echo "<h2>Usuário ou senha incorretos!</h2>";
}
?>