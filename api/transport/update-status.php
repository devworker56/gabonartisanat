<?php
require_once '../../includes/auth.php';
require_once '../../includes/db_connect.php';

header('Content-Type: application/json');

// Validate API key
if (!validateApiKey($_SERVER['HTTP_AUTHORIZATION'] ?? '')) {
    http_response_code(401);
    die(json_encode(['error' => 'Unauthorized']));
}

$input = json_decode(file_get_contents('php://input'), true);
$productId = $input['product_id'] ?? null;
$status = $input['status'] ?? null;
$transporterId = $input['transporter_id'] ?? null;

// Validate status
$validStatuses = ['accepted', 'in_transit', 'delivered', 'cancelled'];
if (!in_array($status, $validStatuses)) {
    http_response_code(400);
    die(json_encode(['error' => 'Invalid status']));
}

try {
    $db = getDB();
    
    // Begin transaction
    $db->beginTransaction();
    
    // Update product status
    $stmt = $db->prepare("
        UPDATE products 
        SET transport_status = ?
        WHERE id = ?
    ");
    $stmt->execute([$status, $productId]);
    
    // Log the status change
    $stmt = $db->prepare("
        INSERT INTO transport_logs 
        (product_id, status, transporter_id, changed_at)
        VALUES (?, ?, ?, NOW())
    ");
    $stmt->execute([$productId, $status, $transporterId]);
    
    // If delivered, mark as no longer needing transport
    if ($status === 'delivered') {
        $stmt = $db->prepare("
            UPDATE products 
            SET needs_transport = 0
            WHERE id = ?
        ");
        $stmt->execute([$productId]);
    }
    
    $db->commit();
    
    echo json_encode(['success' => true]);
    
} catch (PDOException $e) {
    $db->rollBack();
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}