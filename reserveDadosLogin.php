<?php

$email=$_POST["email"];

//tratando as informações recebidas do formulário
$email=strtoupper($email);

//exibindo o conteúdo das variáveis
echo "<h1>Estamos no php</h1>";
echo "email digitando..." .$email; 
echo "<br><br>";

?>