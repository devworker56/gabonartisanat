<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php';

protectPage('admin');

// Get dashboard statistics
try {
    $db = getDB();
    
    // Get pending sellers count
    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE role = 'vendeur' AND statut = 'en_attente'");
    $stmt->execute();
    $pendingSellers = $stmt->fetchColumn();
    
    // Get active products count
    $stmt = $db->prepare("SELECT COUNT(*) FROM products WHERE is_approved = 1 AND deleted_at IS NULL");
    $stmt->execute();
    $activeProducts = $stmt->fetchColumn();
    
    // Get pending shipments count
    $stmt = $db->prepare("SELECT COUNT(*) FROM products WHERE transport_status = 'pending' AND needs_transport = 1");
    $stmt->execute();
    $pendingShipments = $stmt->fetchColumn();
    
    // Get today's orders count
    $stmt = $db->prepare("SELECT COUNT(*) FROM orders WHERE DATE(created_at) = CURDATE()");
    $stmt->execute();
    $todaysOrders = $stmt->fetchColumn();
    
    // Get pending sellers list
    $stmt = $db->prepare("
        SELECT u.id, u.nom, u.prenom, u.email, p.nom as province 
        FROM users u
        LEFT JOIN provinces p ON u.province_id = p.id
        WHERE u.role = 'vendeur' AND u.statut = 'en_attente'
        LIMIT 5
    ");
    $stmt->execute();
    $sellers = $stmt->fetchAll();
    
    // Get products needing shipment
    $stmt = $db->prepare("
        SELECT p.id, p.name, p.quantity, pr.nom as province
        FROM products p
        LEFT JOIN provinces pr ON p.province_id = pr.id
        WHERE p.needs_transport = 1 AND p.transport_status = 'pending'
        LIMIT 5
    ");
    $stmt->execute();
    $productsToShip = $stmt->fetchAll();
    
} catch (PDOException $e) {
    error_log("Dashboard error: " . $e->getMessage());
    $error = "Une erreur est survenue lors du chargement des données.";
}
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-tachometer-alt me-2"></i> Tableau de Bord Administrateur</h1>
        <div class="d-flex">
            <a href="gestion_transport.php" class="btn btn-sm btn-outline-primary me-2">
                <i class="fas fa-truck"></i> Gestion Transport
            </a>
            <button class="btn btn-sm btn-primary" onclick="window.location.reload()">
                <i class="fas fa-sync"></i> Actualiser
            </button>
        </div>
    </div>
    
    <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <div class="row mb-4">
        <!-- Active Sellers Card -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?php echo $pendingSellers; ?></h5>
                            <small class="text-muted">Vendeurs en Attente</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Active Products Card -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-success text-white rounded-circle p-3 me-3">
                            <i class="fas fa-box-open fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?php echo $activeProducts; ?></h5>
                            <small class="text-muted">Produits En Ligne</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pending Shipments Card -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning text-white rounded-circle p-3 me-3">
                            <i class="fas fa-truck-loading fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?php echo $pendingShipments; ?></h5>
                            <small class="text-muted">Expéditions en Attente</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Today's Orders Card -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-info text-white rounded-circle p-3 me-3">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?php echo $todaysOrders; ?></h5>
                            <small class="text-muted">Commandes du Jour</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Pending Sellers Section -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Vendeurs en Attente d'Approbation</h6>
                    <a href="gestion_vendeurs.php" class="btn btn-sm btn-outline-primary">Voir tout</a>
                </div>
                <div class="card-body">
                    <?php if (empty($sellers)): ?>
                        <div class="text-center text-muted py-3">Aucun vendeur en attente</div>
                    <?php else: ?>
                        <?php foreach ($sellers as $seller): ?>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($seller['prenom'].'+'.$seller['nom']); ?>&background=random" 
                                     class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <div class="fw-bold"><?php echo htmlspecialchars($seller['prenom'].' '.$seller['nom']); ?></div>
                                    <small class="text-muted"><?php echo htmlspecialchars($seller['province'] ?? 'N/A'); ?></small>
                                </div>
                            </div>
                            <div>
                                <a href="approve_seller.php?id=<?php echo $seller['id']; ?>" class="btn btn-sm btn-success me-1">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="reject_seller.php?id=<?php echo $seller['id']; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Products to Ship Section -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Produits à Expédier</h6>
                    <a href="gestion_transport.php" class="btn btn-sm btn-outline-primary">Voir tout</a>
                </div>
                <div class="card-body">
                    <?php if (empty($productsToShip)): ?>
                        <div class="text-center text-muted py-3">Aucun produit à expédier</div>
                    <?php else: ?>
                        <?php foreach ($productsToShip as $product): ?>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></div>
                                <small class="text-muted">
                                    Quantité: <?php echo $product['quantity']; ?> | 
                                    <?php echo htmlspecialchars($product['province']); ?>
                                </small>
                            </div>
                            <a href="gestion_transport.php?product_id=<?php echo $product['id']; ?>" 
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-truck me-1"></i> Organiser
                            </a>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>