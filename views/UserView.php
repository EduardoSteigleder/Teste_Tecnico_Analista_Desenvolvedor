<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Usuários</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Usuários</h1>
    <button class="btn-add-user" onclick="toggleModal('addUserModal')">Adicionar Usuário</button>
    <table class="user-table">
      <thead>
        <tr class="header-row">
          <th>Nome</th>
          <th>CPF</th>
          <th>E-mail</th>
          <th>Data de Nascimento</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once "../controllers/UserController.php";
        $handler = new UserController();
        $usuarios = $handler->index();
        foreach ($usuarios as $usuario) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($usuario['nome']) . "</td>";
          echo "<td>" . htmlspecialchars($usuario['cpf']) . "</td>";
          echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
          echo "<td>" . htmlspecialchars($usuario['data_nascimento']) . "</td>";
          echo "<td>" . htmlspecialchars($usuario['telefone']) . "</td>";
          echo "<td><button 
        class=\"action-btn\" 
        onclick=\"openEditModal(" . htmlspecialchars(json_encode($usuario)) . ")\">✏️</button>
      <button 
        class=\"action-btn\" 
        onclick=\"confirmarExcluir(" . $usuario['id'] . ")\">🗑️</button></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>


  <div id="addUserModal" class="modal hidden">
    <div class="modal-content">
      <button class="close-btn" onclick="toggleModal('addUserModal')">X</button>
      <h2>Adicionar Usuário</h2>
      <form id="addUserForm" action="edit.php?action=add" method="POST" onsubmit="return validarFormulario()">
        <input type="text" name="name" placeholder="Nome" required>
        <input type="text" name="cpf" placeholder="CPF (somente números)" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="date" name="birthdate" placeholder="Data de Nascimento" required>
        <input type="text" name="phone" placeholder="Telefone (somente números)" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit" class="btn-submit">Salvar</button>
        <p id="errorMessage" class="error-message"></p>
      </form>
    </div>
  </div>


  <div id="editUserModal" class="modal hidden">
    <div class="modal-content">
      <button class="close-btn" onclick="toggleModal('editUserModal')">X</button>
      <h2>Editar Usuário</h2>
      <form id="editUserForm" action="edit.php?action=edit" method="POST" onsubmit="return validarFormularioEditar()">
        <input type="hidden" name="id" id="editUserId">
        <input type="text" name="name" id="editName" placeholder="Nome" required>
        <input type="text" name="cpf" id="editCpf" placeholder="CPF (somente números)" required>
        <input type="email" name="email" id="editEmail" placeholder="E-mail" required>
        <input type="date" name="birthdate" id="editBirthdate" required>
        <input type="text" name="phone" id="editPhone" placeholder="Telefone (somente números)" required>
        <input type="password" name="password" id="editPassword" placeholder="Nova Senha">
        <button type="submit" class="btn-submit">Salvar Alterações</button>
        <p id="editErrorMessage" class="error-message"></p>
      </form>
    </div>
  </div>


  <div id="confirmDeleteModal" class="modal hidden">
    <div class="modal-content">
      <button class="close-btn" onclick="toggleModal('confirmDeleteModal')">X</button>
      <h2>Confirmar Exclusão</h2>
      <p>Tem certeza de que deseja excluir este usuário?</p>
      <button onclick="deleteUser()" class="btn-submit">Sim</button>
      <button onclick="toggleModal('confirmDeleteModal')" class="btn-cancel">Não</button>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>