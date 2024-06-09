<?php
include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Prepara a instrução SQL para buscar os dados dos livros
$sqlLivros = "SELECT 
                id_livro, 
                capalivro, 
                nomelivro, 
                autor, 
                editora, 
                classificacao, 
                sinopse 
            FROM 
                livros";

// Executa a consulta SQL para buscar os dados dos livros
$resultLivros = $conexao->query($sqlLivros);

// Prepara a instrução SQL para buscar os dados dos empréstimos
$sqlEmprestimos = "SELECT 
                    livros.id_livro, 
                    livros.capalivro, 
                    livros.nomelivro, 
                    livros.autor, 
                    livros.editora, 
                    livros.classificacao, 
                    livros.sinopse, 
                    emprestimos.status, 
                    emprestimos.id_usuario,
                    emprestimos.data_emprestimo, 
                    emprestimos.data_devolucao 
                FROM 
                    livros 
                INNER JOIN 
                    emprestimos ON livros.id_livro = emprestimos.id_livro";

// Executa a consulta SQL para buscar os dados dos empréstimos
$resultEmprestimos = $conexao->query($sqlEmprestimos);

// Verifica se houve algum erro na execução da consulta SQL de livros
if (!$resultLivros) {
    die("Erro na consulta SQL de livros: " . $conexao->error);
}

// Verifica se houve algum erro na execução da consulta SQL de empréstimos
if (!$resultEmprestimos) {
    die("Erro na consulta SQL de empréstimos: " . $conexao->error);
}

// Cria um array para armazenar os dados dos livros e empréstimos
$livros = array();

// Percorre os resultados da consulta de livros e adiciona ao array
while ($rowLivros = $resultLivros->fetch_assoc()) {
    // Inicializa o array de empréstimos para cada livro
    $rowLivros['status'] = null;
    $rowLivros['id_usuario'] = null;
    $rowLivros['data_emprestimo'] = null;
    $rowLivros['data_devolucao'] = null;
    // Adiciona os dados do livro ao array
    $livros[] = $rowLivros;
}

// Percorre os resultados da consulta de empréstimos e atualiza o array de livros
while ($rowEmprestimos = $resultEmprestimos->fetch_assoc()) {
  // Variável para verificar se o livro já foi atualizado
  $livroAtualizado = false;
  // Procura o livro correspondente no array de livros
  foreach ($livros as &$livro) {
      if ($livro['id_livro'] === $rowEmprestimos['id_livro']) {
          // Verifica se o livro já foi atualizado
          if (!$livroAtualizado) {
              // Atualiza os dados de empréstimo para o livro correspondente
              $livro['status'] = $rowEmprestimos['status'];
              $livro['id_usuario'] = $rowEmprestimos['id_usuario'];
              $livro['data_emprestimo'] = $rowEmprestimos['data_emprestimo'];
              $livro['data_devolucao'] = $rowEmprestimos['data_devolucao'];
              // Marca o livro como atualizado
              $livroAtualizado = true;
          }
      }
  }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"> <!-- Define a codificação do documento como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Define a viewport para dispositivos móveis -->
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> <!-- Outra definição de viewport -->
    <link rel="stylesheet" href="./Assets/CSS/custom.css"> <!-- Importa folha de estilo personalizada -->
    <link rel="stylesheet" href="./Assets/CSS/menuLateralAdmin.css"> <!-- Importa folha de estilo do menu lateral -->
    <link rel="shortcut icon" href="./Assets/Imagens/logo.png" type="image/x-icon"> <!-- Define o ícone da página -->
        <title>Catálogo de livros</title> <!-- Título da página -->
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
	    <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

  </head>
  <body>
    <nav id="sidebar"> <!-- Barra de navegação lateral -->
      <div id="sidebar-content">
          <div id="user"> <!-- Informações do usuário -->
              <img src="./Assets/Imagens/avatar admin.png" id="user-avatar" alt="avatar do usuário" width="50px">
              <p id="user-infos">
                  <span class="item-description">
                      Letícia,
                  </span>
                  <span class="item-description">
                      Administradora
                  </span>
              </p>
          </div>
           <!-- Lista de itens do menu -->
          <ul id="side-itens">    
              <li class="side-item">
                  <a href="usuariosAdmin.php">
                      <img class="icon-perfil" src="./Assets/Imagens/icon user.png" alt="icone perfil do usuário" width="15px">
                      <span class="item-description">
                          Usuários
                      </span>
                  </a>
              </li>
              <li class="side-item active">
                  <a href="catalogoLivro.php">
                      <img class="" src="./Assets/Imagens/icon catalog.png" alt="icone catálogo de livros" width="15px">
                      <span class="item-description">
                          Catálogo de livros
                      </span>
                  </a>
              </li>
              
          </ul>
          <!-- Botão para abrir o menu -->
          <button id="open-btn">
              <img id="open-btn-icon" src="./Assets/Imagens/icon seta.ico" alt="icone de seta" width="15px">
          </button>
      </div>
      <!-- Botão de logout -->
      <div id="logout">
          <button id="logout-btn">
              <img id="logout-btn-icon" src="./Assets/Imagens/icon logout.ico" alt="ícone logout" width="15px">
              <span class="item-description">
                  Logout
              </span>
          </button>
      </div>

  </nav>
    <div class="wrapper">

        <div class="body-overlay"></div>

		<!-- Conteúdo da página -->
		
		<div id="content">
		   
		    <!-- Conteúdo principal -->
		   
		   <div class="main-content">
			  <div class="row">
			    
				<div class="col-md-12">
          <!-- Tabela de catálogo de livros -->
				<div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <!-- Título da tabela -->
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Catálogo de livros</h2>
        </div>
        <!-- Botões para adicionar e excluir livros -->
        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
		  <i class="material-icons">&#xE147;</i> <span>Novo livro</span></a>
        </div>
      </div>
    </div>
    <!-- Tabela de dados -->
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <!-- Cabeçalhos da tabela -->
          <th>ID Livro</th>
          <th>Capa do livro</th>
          <th>Nome</th>
          <th>Autor</th>
          <th>Editora</th>
          <th>Classificação</th>
          <th>Sinopse</th>
          <th>Status</th>
          <th>ID Aluno</th>
          <th>Data de empréstimo</th>
          <th>Data de devolução</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dados do usuário -->
      <?php foreach ($livros as $livro): ?>
         <tr>
          <td><?php echo $livro['id_livro']; ?></td>
          <td><?php echo "<img src='Assets/Imagens/" . $livro['capalivro'] . "' class='card-img-top' alt='Capa do livro: " . $livro['nomelivro'] . "'>"; ?></td>
          <td><?php echo $livro['nomelivro']; ?></td>
          <td><?php echo $livro['autor']; ?></td>
          <td><?php echo $livro['editora']; ?></td>
          <td><?php echo $livro['classificacao']; ?></td>
          <td><?php echo $livro['sinopse']; ?></td>
          <td><?php echo $livro['status']; ?></td>
          <td><?php echo $livro['id_usuario']; ?></td>
          <td><?php echo $livro['data_emprestimo']; ?></td>
          <td><?php echo $livro['data_devolucao']; ?></td>
          <td>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
              <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
            </a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
              <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
            </a>
         </td>
        </tr>       
      <?php endforeach; ?>
      </tbody>
    </table>

<!-- Modais para adicionar, editar e excluir livros -->
<!-- NOVO LIVRO HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="dadosNovoLivro.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Novo livro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Capa do livro</label>
            <input type="file" id="capalivro" name="capalivro" accept="image/*" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nome</label>
            <input id="namelivro" name="namelivro" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Autor</label>
            <input id="autor" name="autor" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Editora</label>
            <input id="editora" name="editora" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Classificação</label>
            <input id="classificacao" name="classificacao" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Sinopse</label>
            <input id="sinopse" name="sinopse" type="text" class="form-control" required>
          </div>     
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-success" value="Adicionar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- EDITAR HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="editarLivro.php" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Editar livro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Status</label><br>
            <input type="radio" name="status" value="alugado"> Alugado <br>
            <input type="radio" name="status" value="disponivel"> Disponível
          </div>
          <div class="form-group">
            <label>ID Livro</label>
            <input name="id_livro" type="number" class="form-control" required>
          </div>
          <div class="form-group">
            <label>ID Usuário</label>
            <input name="id_usuario" type="number" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Data de empréstimo</label>
            <input name="data_emprestimo" type="date" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Data de devolução</label>
            <input name="data_devolucao" type="date" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-info" value="Salvar">
        </div>
      </form>
    </div>
  </div>
</div>


<!-- DELETAR HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="excluirLivroAdmin.php" method="POST">  
        <div class="modal-header">
          <h4 class="modal-title">Deletar livro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Você quer deletar esse livro?</p>
          <p class="text-warning"><small>Esta ação não poderá ser desfeita.</small></p>
          <div class="form-header">
            <div class="input-group">
                <div class="input-box">
                    <label for="id_livro">Informe o ID do livro para isso!</label>
                    <input id="id_livro" type="text" name="id_livro" placeholder="ID Livro" required maxlength="80">
                </div>
            </div>
            </div>
        </div>
        

        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-danger" value="Excluir">
        </div>
      </form>
    </div>
	</div>
  </div>
				
			  </div>


    <!--JavaScript, jQuery, Popper.js e Bootstrap JS-->
   <script src="./Assets/JS/jquery-3.3.1.slim.min.js"></script>
   <script src="./Assets/JS/popper.min.js"></script>
   <script src="./Assets/JS/bootstrap.min.js"></script>
   <script src="./Assets/JS/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
        
		$(document).ready(function(){
		  $(".xp-menubar").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".xp-menubar,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
		
    </script>
    <script src="./Assets/JS/scriptMenuUser.js"></script>

  </body>
  
  </html>


