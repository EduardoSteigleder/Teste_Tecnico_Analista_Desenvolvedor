
<?php
require('../controllers/UserController.php');
$userController = new UserController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'add':
                $result = $userController->add();
                if ($result) {
                    echo "<script>
                    alert('Usuario Cadastrado com sucesso');
                    window.location.href = '../views/UserView.php';
                    </script>";
                } else {
                    echo "Erro ao adicionar o usuário.";
                }
                break;
            case 'edit':
                $result = $userController->update();
                if ($result) {
                    echo "<script>
                    alert('Usuario Atualizado com sucesso');
                    window.location.href = '../views/UserView.php';
                    </script>";
                } else {
                    echo "Erro ao atualizar o usuário.";
                }
                break;
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        echo "entrou delet";
        $result = $userController->delete();
        if ($result) {
            echo "<script>
            alert('Usuario Deletado com sucesso');
            window.location.href = '../views/UserView.php';
            </script>";
        } else {
            echo "Erro ao excluir o usuário.";
        }
    }
}




?>
