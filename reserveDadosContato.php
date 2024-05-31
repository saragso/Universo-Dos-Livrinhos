<?php

$nome=$_POST["firstname"];
$sobrenome=$_POST["lastname"];
$email=$_POST["email"];
$celular=$_POST["number"];
$mensagem=$_POST["mensagem-texto"];

//tratando as informações recebidas do formulário
$nome=strtoupper($nome);
$sobrenome=strtoupper($sobrenome);
$email=strtoupper($email);
$celular=strtoupper($celular);
$mensagem=strtoupper($mensagem);

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
echo "Mensagem salva! Entraremos em contato em breve";

?>
