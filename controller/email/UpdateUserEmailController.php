<?php
class UpdateUserEmailController {
    private $userModel;

    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }

    public function execute($userId, $newEmail, $password) {
        // Initialisation des messages d'erreur et de succès
        $errors = [];
        $success = "";

        // Récupération des informations de l'utilisateur
        $userInfo = $this->userModel->getUserById($userId);
        $email_actuel = $userInfo ? $userInfo['mail'] : '';

        // Logique de mise à jour de l'email
        if (empty($newEmail) || empty($password)) {
            $errors[] = "Tous les champs doivent être remplis.";
        } elseif (!$this->userModel->is_valid_email($newEmail)) {
            $errors[] = "Adresse e-mail invalide.";
        } elseif ($newEmail === $email_actuel) {
            $errors[] = "La nouvelle adresse e-mail est identique à l'adresse actuelle.";
        } elseif ($this->userModel->emailExists($newEmail, $userId)) {
            $errors[] = "Cette adresse e-mail est déjà utilisée par un autre utilisateur.";
        } elseif (!$this->userModel->verifyPassword($userId, $password)) {
            $errors[] = "Le mot de passe actuel est incorrect.";
        } else {
            if ($this->userModel->updateEmail($newEmail, $userId)) {
                $success = "L'adresse e-mail a été mise à jour avec succès.";
            } else {
                $errors[] = "Une erreur est survenue lors de la mise à jour de l'e-mail.";
            }
        }

        // Retour des résultats
        return ['errors' => $errors, 'success' => $success];
    }
}
