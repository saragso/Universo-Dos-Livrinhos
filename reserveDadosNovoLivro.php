<?php

$capalivro=$_POST["capalivro"];
$nomelivro=$_POST["namelivro"];
$autor=$_POST["autor"];
$editora=$_POST["editora"];
$classificacao=$_POST["classificacao"];
$sinopse=$_POST["sinopse"];
$status=$_POST["status"];
$idaluno=$_POST["id_aluno"];
$emprestimo=$_POST["dataemprestimo"];
$devolucao=$_POST["datadevolucao"];

//tratando as informações recebidas do formulário
$capalivro=strtoupper($capalivro);
$nomelivro=strtoupper($nomelivro);
$autor=strtoupper($autor);
$editora=strtoupper($editora);
$classificacao=strtoupper($classificacao);
$sinopse=strtoupper($sinopse);
$status=strtoupper($status);
$idaluno=strtoupper($idaluno);
$emprestimo=strtoupper($emprestimo);
$devolucao=strtoupper($devolucao);

//exibindo o conteúdo das variáveis
echo "<h1>Estamos no php</h1>";
echo "Nome do livro: " .$nomelivro; 
echo "<br><br>";
echo "Autor: " .$autor; 
echo "<br><br>";
echo "Editora: " .$editora; 
echo "<br><br>";
echo "Classificação: " .$classificacao; 
echo "Sinopse: " .$sinopse; 
echo "<br><br>";
echo "Status: " .$status; 
echo "<br><br>";
echo "ID do aluno: " .$idaluno; 
echo "<br><br>";
echo "Data de empréstimo: " .$emprestimo; 
echo "<br><br>";
echo "Data de devolução: " .$devolucao; 
echo "<br><br>";

?>
