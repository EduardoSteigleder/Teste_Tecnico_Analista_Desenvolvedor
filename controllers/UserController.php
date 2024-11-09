<?php

require "../models/UserModel.php";

class UserController
{
    private $userModel;


    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        return $this->userModel->getAllUsers();
    }

    public function add()
    {

        if ($this->userModel->validCpf($_POST['cpf'])) {
            echo "<script>
                    alert('O CPF " . $_POST['cpf'] . " já existe');
                    window.location.href = '../views/UserView.php?openAddUserModal=true';
                  </script>";
            return false;
        } else {
            $data = [
                'nome' => $_POST['name'],
                'cpf' => $_POST['cpf'],
                'email' => $_POST['email'],
                'data_nascimento' => $_POST['birthdate'],
                'telefone' => $_POST['phone'],
                'senha' => $_POST['password'],
            ];
            return $this->userModel->createUser($data);
        }
    }


    public function update()
    {

        if ($this->userModel->validCpfEdit($_POST['cpf'], $_POST['id'])) {
            echo "<script>
                    alert('O CPF " . $_POST['cpf'] . " já existe');
                    window.location.href = '../views/UserView.php';
                  </script>";
            return false;
        } else {
            $id = $_POST['id'];
            $data = [
                'nome' => $_POST['name'],
                'cpf' => $_POST['cpf'],
                'email' => $_POST['email'],
                'data_nascimento' => $_POST['birthdate'],
                'telefone' => $_POST['phone'],
                'senha' => $_POST['password'],
            ];



            return $this->userModel->updateUser($id, $data);
        }
    }
    public function delete()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            return $this->userModel->deleteUser($id);
        } else {
            echo "ID do usuário não fornecido.";
        }
    }
}
