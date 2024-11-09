
function openEditModal(userData) {
   
  document.getElementById("editUserId").value = userData.id;
  document.getElementById("editName").value = userData.nome;
  document.getElementById("editCpf").value = userData.cpf;
  document.getElementById("editEmail").value = userData.email;
  document.getElementById("editBirthdate").value = userData.data_nascimento;
  document.getElementById("editPhone").value = userData.telefone;

  
  toggleModal("editUserModal");
}
function toggleModal(modalId) {
  document.getElementById(modalId).classList.toggle("hidden");
}


function confirmarExcluir(userId) {
  document.getElementById("confirmDeleteModal").dataset.userId = userId;
  toggleModal("confirmDeleteModal");
}

function deleteUser() {
  let userId = document.getElementById("confirmDeleteModal").dataset.userId;
  window.location.href = "edit.php?action=delete&id=" + userId;
}

window.onload = function() {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('openAddUserModal')) {
    toggleModal('addUserModal');
  }
};
function toggleModal(modalId) {
  document.getElementById(modalId).classList.toggle("hidden");
}
