<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    
    $result = loginUser($email, $password);
    
    if ($result !== true) {
        redirectWithMessage('connexion.php', 'danger', $result);
    }
}
?>