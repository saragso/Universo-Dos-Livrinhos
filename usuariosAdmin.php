<?php
include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Prepara a instrução SQL para buscar os dados dos usuários
$sql = "SELECT foto_perfil, id_usuario, nome_aluno, sobrenome_aluno, email FROM usuarios";
$result = $conexao->query($sql);

// Verifica se houve algum erro na execução da consulta SQL
if (!$result) {
    die("Erro na consulta SQL: " . $conexao->error);
}

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Cria um array para armazenar os dados dos usuários
    $usuarios = array();
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
} else {
    $usuarios = [];
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <!--Define o conjunto de caracteres UTF-8 para suportar diferentes idiomas-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="./Assets/CSS/custom.css">
    <link rel="stylesheet" href="./Assets/CSS/menuLateralAdmin.css">
    <link rel="shortcut icon" href="./Assets/Imagens/logo.png" type="image/x-icon">
        <title>Usuários</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="./Assets/CSS/custom.css">
	    <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

  </head>
  <body>
    <!-- Barra de navegação lateral -->
    <nav id="sidebar">
      <div id="sidebar-content">
         <!-- Informações do usuário -->
          <div id="user">
            <!-- Imagem do avatar do usuário -->
              <img src="./Assets/Imagens/avatar admin.png" id="user-avatar" alt="avatar do usuário" width="50px">
              <p id="user-infos">
                <!-- Nome e cargo do usuário -->
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
             <!-- Item do menu ativo (Usuários) -->
              <li class="side-item active">
                  <a href="usuariosAdmin.php">
                      <img class="icon-perfil" src="./Assets/Imagens/icon user.png" alt="icone perfil do usuário" width="15px">
                      <span class="item-description">
                          Usuários
                      </span>
                  </a>
              </li>
              <li class="side-item">
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
    <!-- Div para envolver o conteúdo da página -->
    <div class="wrapper">

        <div class="body-overlay"></div>

		<!-- Conteúdo da página -->
		
		<div id="content">
		   
		   <!-- Conteúdo principal -->
		   
		   <div class="main-content">
			  <div class="row">
			    
				<div class="col-md-12">
				<div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Usuários</h2>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <!-- Tabela de dados dos usuários -->
      <thead>
        <tr>
          
          <th>Foto de perfil</th>
          <th>id_aluno</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>E-mail</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dados do usuário -->
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
          <td><?php echo $usuario['foto_perfil']; ?></td>
          <td><?php echo $usuario['id_usuario']; ?></td>
          <td><?php echo $usuario['nome_aluno']; ?></td>
          <td><?php echo $usuario['sobrenome_aluno']; ?></td>
          <td><?php echo $usuario['email']; ?></td>
          <td>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          </td>
        </tr>       
        <?php endforeach; ?>
      </tbody>
    </table>


<!-- EDITAR HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="editaUser.php" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Editar usuário</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nome</label>
            <input id="nome_aluno" name="nome_aluno" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Sobrenome</label>
            <input id="sobrenome_aluno" name="sobrenome_aluno" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input id="email" name="email" type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="id_usuario">Informe o ID do aluno para isso!</label>
            <input id="id_usuario" name="id_usuario" type="text" class="form-control" required maxlength="80">
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
      <form action="excluirUserAdmin.php" method="POST"> 
        <div class="modal-header">
          <h4 class="modal-title">Deletar usuário</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Você quer deletar esse usuário?</p>
          <p class="text-warning"><small>Esta ação não poderá ser desfeita.</small></p>
            
            <div class="form-header">
            <div class="input-group">
                <div class="input-box">
                    <label for="id_usuario">Informe o ID do aluno para isso!</label>
                    <input id="id_usuario" type="text" name="id_usuario" placeholder="ID Aluno" required maxlength="80">
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