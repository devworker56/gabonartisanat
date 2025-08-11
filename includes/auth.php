<?php
require_once 'config.php';  // Add this line to include config
require_once 'functions.php';
require_once 'db_connect.php';  // Add this line for database connection

// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Validate API key for external requests
 */
function validateApiKey($authHeader) {
    if (empty($authHeader)) {
        return false;
    }
    
    $expected = 'Bearer ' . MPG_API_KEY;
    return trim($authHeader) === $expected;
}

/**
 * Protège une page en vérifiant si l'utilisateur est connecté
 * @param string $requiredRole Le rôle requis pour accéder à la page (admin, vendeur, client)
 */
function protectPage($requiredRole = null) {
    if (!isLoggedIn()) {
        redirectWithMessage('connexion.php', 'danger', 'Veuillez vous connecter pour accéder à cette page.');
    }
    
    if ($requiredRole) {
        $userRole = $_SESSION['user_role'];
        
        if ($requiredRole === 'admin' && !isAdmin()) {
            redirectWithMessage('index.php', 'danger', 'Accès refusé. Droits insuffisants.');
        }
        
        if ($requiredRole === 'vendeur' && !isSeller()) {
            redirectWithMessage('index.php', 'danger', 'Accès refusé. Droits insuffisants.');
        }
        
        if ($requiredRole === 'client' && !isClient()) {
            redirectWithMessage('index.php', 'danger', 'Accès refusé. Droits insuffisants.');
        }
    }
}

/**
 * Vérifie les informations de connexion
 */
function loginUser($email, $password) {
    $db = getDB();
    
    try {
        $stmt = $db->prepare("SELECT id, nom, prenom, email, password, role, statut FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            // Vérifier si le compte est approuvé (pour les vendeurs)
            if ($user['role'] === 'vendeur' && $user['statut'] !== 'approuve') {
                return "Votre compte vendeur est en attente d'approbation.";
            }
            
            // Enregistrer les informations de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['prenom'] . ' ' . $user['nom'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            
            // Rediriger vers le tableau de bord approprié
            if ($user['role'] === 'admin') {
                header("Location: admin/dashboard.php");
            } elseif ($user['role'] === 'vendeur') {
                header("Location: vendeur/dashboard.php");
            } else {
                header("Location: client/accueil.php");
            }
            exit();
        } else {
            return "Email ou mot de passe incorrect.";
        }
    } catch(PDOException $e) {
        return "Erreur lors de la connexion: " . $e->getMessage();
    }
}

/**
 * Enregistre un nouvel utilisateur
 */
function registerUser($userData) {
    $db = getDB();
    
    // Vérifier si l'email existe déjà
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$userData['email']]);
    
    if ($stmt->rowCount() > 0) {
        return "Cet email est déjà utilisé.";
    }
    
    // Hasher le mot de passe
    $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
    
    // Définir le statut initial
    $statut = ($userData['user_type'] === 'vendeur') ? 'en_attente' : 'actif';
    
    try {
        $stmt = $db->prepare("INSERT INTO users (nom, prenom, email, telephone, password, role, statut, created_at) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([
            $userData['nom'],
            $userData['prenom'],
            $userData['email'],
            $userData['telephone'],
            $hashedPassword,
            $userData['user_type'],
            $statut
        ]);
        
        return true;
    } catch(PDOException $e) {
        return "Erreur lors de l'inscription: " . $e->getMessage();
    }
}

/**
 * Déconnecte l'utilisateur
 */
function logoutUser() {
    // Détruire toutes les données de session
    $_SESSION = array();
    
    // Détruire le cookie de session
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Détruire la session
    session_destroy();
    
    // Rediriger vers la page de connexion
    header("Location: connexion.php");
    exit();
}

/**
 * Role checking functions
 */
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isSeller() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'vendeur';
}

function isClient() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'client';
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Generate JWT token for API authentication
 */
function generateJWT($payload) {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode($payload);
    
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    
    return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
}

/**
 * Validate JWT token
 */
function validateJWT($token) {
    try {
        $parts = explode('.', $token);
        if (count($parts) !== 3) return false;
        
        $signature = hash_hmac('sha256', $parts[0] . "." . $parts[1], JWT_SECRET, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        
        return hash_equals($base64UrlSignature, $parts[2]);
    } catch (Exception $e) {
        return false;
    }
}