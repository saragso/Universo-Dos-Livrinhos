<?php

$status=$_POST["status"];
$idaluno=$_POST["id_aluno"];
$emprestimo=$_POST["dataemprestimo"];
$devolucao=$_POST["datadevolucao"];

//tratando as informações recebidas do formulário
$status=strtoupper($status);
$idaluno=strtoupper($idaluno);
$emprestimo=strtoupper($emprestimo);
$devolucao=strtoupper($devolucao);

//exibindo o conteúdo das variáveis
echo "<h1>Estamos no php</h1>";
echo "Status: " .$status; 
echo "<br><br>";
echo "ID do aluno: " .$idaluno; 
echo "<br><br>";
echo "Data de empréstimo: " .$emprestimo; 
echo "<br><br>";
echo "Data de devolução: " .$devolucao; 
echo "<br><br>";
?>
