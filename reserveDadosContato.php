<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome_aluno = strtoupper($_POST["firstname"]);
    $sobrenome_aluno = strtoupper($_POST["lastname"]);
    $email = strtoupper($_POST["email"]);
    $telefone_contato = strtoupper($_POST["number"]);
    $mensagem = strtoupper($_POST["mensagem-texto"]);

    // Inserir os dados no banco de dados (substitua 'sua_tabela' pelo nome da sua tabela)
    $sql_insert = "INSERT INTO sua_tabela (nome_aluno, sobrenome_aluno, email, telefone_contato, mensagem) VALUES ('$nome_aluno', '$sobrenome_aluno', '$email', '$telefone_contato', '$mensagem')";
    
    if ($conexao->query($sql_insert) === TRUE) {
        echo "Mensagem salva! Entraremos em contato em breve";
    } else {
        echo "Erro ao salvar mensagem: " . $conexao->error;
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
