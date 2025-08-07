<?php
require_once 'db_connect.php';

/**
 * Nettoie et sécurise une donnée
 */
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Vérifie si un utilisateur est connecté
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Vérifie si l'utilisateur connecté est un administrateur
 */
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

/**
 * Vérifie si l'utilisateur connecté est un vendeur
 */
function isSeller() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'vendeur';
}

/**
 * Vérifie si l'utilisateur connecté est un client
 */
function isClient() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'client';
}

/**
 * Redirige vers une page avec un message flash
 */
function redirectWithMessage($url, $type, $message) {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
    header("Location: $url");
    exit();
}

/**
 * Affiche un message flash s'il existe
 */
function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $type = $_SESSION['flash_type'] ?? 'info';
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        unset($_SESSION['flash_type']);
        
        echo "<div class='alert alert-$type alert-dismissible fade show' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
}

/**
 * Formate un prix en XAF
 */
function formatPrice($price) {
    return number_format($price, 0, ',', ' ') . ' XAF';
}

/**
 * Valide une image uploadée
 */
function validateImage($file) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = MAX_FILE_SIZE;
    
    if (!in_array($file['type'], $allowedTypes)) {
        return "Type de fichier non supporté. Seuls JPG, PNG et GIF sont autorisés.";
    }
    
    if ($file['size'] > $maxSize) {
        return "La taille du fichier ne doit pas dépasser " . ($maxSize / (1024 * 1024)) . "MB.";
    }
    
    return true;
}
?>