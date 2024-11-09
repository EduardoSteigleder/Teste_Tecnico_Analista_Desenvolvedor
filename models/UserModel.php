<?php
require_once "../config/dbConfig.php";

class User
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllUsers()
    {
        $query = "SELECT id, nome, cpf, email, data_nascimento, telefone FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validCpf($cpf)
    {
        $database = new Database();
        $conn = $database->getConnection();
        $query = "SELECT COUNT(*) FROM users WHERE cpf = :cpf";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function validCpfEdit($cpf, $id)
    {
        $database = new Database();
        $conn = $database->getConnection();
        $query = "SELECT COUNT(*) FROM users WHERE cpf = :cpf and id <> :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function createUser($data)
    {
        $query = "INSERT INTO users (nome, cpf, email, data_nascimento, telefone, senha) VALUES (:nome, :cpf, :email, :data_nascimento, :telefone, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $data['nome']);
        $stmt->bindParam(":cpf", $data['cpf']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":data_nascimento", $data['data_nascimento']);
        $stmt->bindParam(":telefone", $data['telefone']);
        $senhaHashed = password_hash($data['senha'], PASSWORD_BCRYPT);
        $stmt->bindParam(":senha", $senhaHashed);
        return $stmt->execute();
    }

    public function updateUser($id, $data)
    {
        $query = "UPDATE users SET nome=:nome, cpf=:cpf, email=:email, data_nascimento=:data_nascimento, telefone=:telefone" . (!empty($data['senha']) ? ", senha=:senha" : "") . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $data['nome']);
        $stmt->bindParam(":cpf", $data['cpf']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":data_nascimento", $data['data_nascimento']);
        $stmt->bindParam(":telefone", $data['telefone']);
        $stmt->bindParam(":id", $id);

        if (!empty($data['senha'])) {
            $senhaHashed = password_hash($data['senha'], PASSWORD_BCRYPT);
            $stmt->bindParam(":senha", $senhaHashed);
        }

        return $stmt->execute();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
