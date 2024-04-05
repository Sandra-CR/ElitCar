<?php

class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id_user) {
        $stmt = $this->pdo->prepare("SELECT * FROM particular WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $id_user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function emailExists($email, $id_user) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM particular WHERE mail = :email AND id_user != :id_user");
        $stmt->execute([':email' => $email, ':id_user' => $id_user]);
        return $stmt->fetchColumn() > 0;
    }

    public function updateEmail($newEmail, $id_user) {
        $stmt = $this->pdo->prepare("UPDATE particular SET mail = :newEmail WHERE id_user = :id_user");
        $stmt->execute([':newEmail' => $newEmail, ':id_user' => $id_user]);
        return $stmt->rowCount() > 0;
    }
    
    public function verifyPassword($id_user, $password) {
        $stmt = $this->pdo->prepare("SELECT psw FROM particular WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $id_user]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return password_verify($password, $user['psw']);
        }

        return false;
    }

    // Vérification de la syntaxe de l'e-mail
    public function is_valid_email($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if (strlen($email) > 254) {
            return false;
        }
        if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/', $email)) {
            return false;
        }
        $domain = explode('@', $email)[1];
        if (!checkdnsrr($domain, 'MX')) {
            return false;
        }
        return true;
    }
}
