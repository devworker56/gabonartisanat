<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et nettoyer les données
    $userData = [
        'user_type' => sanitize($_POST['user_type']),
        'prenom' => sanitize($_POST['prenom']),
        'nom' => sanitize($_POST['nom']),
        'email' => sanitize($_POST['email']),
        'telephone' => sanitize($_POST['telephone']),
        'password' => $_POST['password'],
        'confirm_password' => $_POST['confirm_password']
    ];
    
    // Validation simple
    if ($userData['password'] !== $userData['confirm_password']) {
        redirectWithMessage('inscription.php', 'danger', 'Les mots de passe ne correspondent pas.');
    }
    
    // Enregistrer l'utilisateur
    $result = registerUser($userData);
    
    if ($result === true) {
        $message = ($userData['user_type'] === 'vendeur') 
            ? "Inscription réussie! Votre compte vendeur est en attente d'approbation." 
            : "Inscription réussie! Vous pouvez maintenant vous connecter.";
        
        redirectWithMessage('connexion.php', 'success', $message);
    } else {
        redirectWithMessage('inscription.php', 'danger', $result);
    }
}
?>