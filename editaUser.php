<?php

$nome=$_POST["nome"];
$sobrenome=$_POST["sobrenome"];
$email=$_POST["email"];

//tratando as informações recebidas do formulário
$nome=strtoupper($nome);
$sobrenome=strtoupper($sobrenome);
$email=strtoupper($email);

//exibindo o conteúdo das variáveis
echo "<h1>Estamos no php</h1>";
echo "Nome: " .$nome; 
echo "<br><br>";
echo "Sobrenome: " .$sobrenome; 
echo "<br><br>";
echo "Email: " .$email; 
echo "<br><br>";

?>
