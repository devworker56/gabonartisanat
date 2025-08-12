<?php
require_once 'includes/auth.php';
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';

header("Content-Type: application/json");

// Validate API key
$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? '';

if (!validateApiKey($authHeader)) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized - Invalid API key']);
    exit();
}

// Get transport requests
if ($_SERVER['REQUEST_METHOD'] === 'GET' && strpos($_SERVER['REQUEST_URI'], '/api/v1/transport/requests') !== false) {
    try {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT p.id, p.nom, p.prix, p.quantite, p.province_origine, 
                   u.nom as vendeur_nom, u.telephone as vendeur_contact
            FROM produits p
            JOIN users u ON p.vendeur_id = u.id
            WHERE p.besoin_transport = 1 AND p.statut = 'approuve'
        ");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['data' => $products]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
    exit();
}

// Other API endpoints can be added here