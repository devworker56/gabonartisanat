<?php
require_once '../../includes/auth.php';
require_once '../../includes/db_connect.php';

protectPage('admin');

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$productIds = $input['products'] ?? [];

if (empty($productIds)) {
    http_response_code(400);
    die(json_encode(['error' => 'No products selected']));
}

try {
    $db = getDB();
    
    // Mark products as ready for transport
    $placeholders = implode(',', array_fill(0, count($productIds), '?'));
    $stmt = $db->prepare("
        UPDATE products 
        SET needs_transport = 1, transport_status = 'pending'
        WHERE id IN ($placeholders)
    ");
    $stmt->execute($productIds);
    
    // Generate a transport token for security
    $transportToken = bin2hex(random_bytes(16));
    
    // Store the transport request
    $stmt = $db->prepare("
        INSERT INTO transport_requests 
        (token, product_ids, created_by, status)
        VALUES (?, ?, ?, 'pending')
    ");
    $stmt->execute([
        $transportToken,
        implode(',', $productIds),
        $_SESSION['user']['id'],
        'pending'
    ]);
    
    // Generate a transport link
    $transportLink = TPG_BASE_URL . '/transport-request?token=' . $transportToken;
    
    echo json_encode([
        'success' => true,
        'transport_link' => $transportLink,
        'token' => $transportToken
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}