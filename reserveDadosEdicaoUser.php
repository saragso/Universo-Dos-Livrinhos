<?php

$nome=$_POST["Nome completo do aluno"];
$sobrenome=$_POST["nome-responsavel"];
$email=$_POST["email"];
$celular=$_POST["number"];
$novasenha=$_POST["new-password"];

//tratando as informações recebidas do formulário
$nome=strtoupper($nome);
$sobrenome=strtoupper($sobrenome);
$email=strtoupper($email);
$celular=strtoupper($celular);
$novasenha=strtoupper($novasenha);

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
echo "Senha alterada";

?>
