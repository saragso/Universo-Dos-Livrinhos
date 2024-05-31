<?php

$email=$_POST["email"];
$senha=$_POST["password"];

//tratando as informações recebidas do formulário
$email=strtoupper($email);
$senha=strtoupper($senha);

//exibindo o conteúdo das variáveis
echo "<h1>Estamos no php</h1>";
echo "E-mail:" .$email; 
echo "<br><br>";
echo "Senha salva!";

?>
