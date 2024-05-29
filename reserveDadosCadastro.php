<?php

$nome=$_POST["firstname"];
$sobrenome=$_POST["lastname"];
$email=$_POST["email"];
$celular=$_POST["number"];
$senha=$_POST["password"];
$confirmasenha=$_POST["confirmPassword"];

//tratando as informações recebidas do formulário
$nome=strtoupper($nome);
$sobrenome=strtoupper($sobrenome);
$email=strtoupper($email);
$celular=strtoupper($celular);
$senha=strtoupper($senha);
$confirmasenha=strtoupper($confirmasenha)

//exibindo o conteúdo das variáveis
echo "<h1>Estamos no php</h1>";
echo "Nome: " .$nome; 
echo "<br><br>";
echo "Sobrenome: " .$sobrenome; 
echo "<br><br>";
echo "Email: " .$email; 
echo "<br><br>";
echo "Celular: " .$celular; 
echo "<br><br>";
echo "Senha gravada com sucesso";

?>
