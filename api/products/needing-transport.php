<?php
require_once '../../includes/auth.php';
require_once '../../includes/db_connect.php';

header('Content-Type: application/json');

// Validate API key
if (!validateApiKey($_SERVER['HTTP_AUTHORIZATION'] ?? '')) {
    http_response_code(401);
    die(json_encode(['error' => 'Unauthorized']));
}

try {
    $db = getDB();
    
    // Get products that need transport to Libreville
    $stmt = $db->prepare("
        SELECT 
            p.id,
            p.name,
            p.description,
            p.weight_kg,
            p.dimensions,
            p.province_id as province_depart_id,
            s.pickup_address,
            s.contact_phone,
            p.transport_deadline,
            p.created_at
        FROM products p
        JOIN sellers s ON p.seller_id = s.id
        WHERE p.needs_transport = 1 
        AND p.transport_status = 'pending'
        AND p.is_approved = 1
        ORDER BY p.transport_deadline ASC
    ");
    $stmt->execute();
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Add province names
    $provinces = [
        1 => 'Estuaire',
        2 => 'Haut-Ogooué',
        3 => 'Moyen-Ogooué',
        4 => 'Ngounié',
        5 => 'Nyanga',
        6 => 'Ogooué-Ivindo',
        7 => 'Ogooué-Lolo',
        8 => 'Ogooué-Maritime',
        9 => 'Woleu-Ntem'
    ];
    
    foreach ($products as &$product) {
        $product['province_name'] = $provinces[$product['province_depart_id']] ?? 'Inconnue';
        $product['destination'] = 'Entrepôt MPG, Libreville';
    }
    
    echo json_encode([
        'success' => true,
        'data' => $products,
        'timestamp' => time()
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}