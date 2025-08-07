<?php
require_once '../includes/auth.php';
protectPage('admin');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-tachometer-alt me-2"></i> Tableau de Bord Administrateur</h1>
        <div class="d-flex">
            <button class="btn btn-sm btn-outline-secondary me-2">
                <i class="fas fa-download"></i> Exporter
            </button>
            <button class="btn btn-sm btn-primary">
                <i class="fas fa-sync"></i> Actualiser
            </button>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">48</h5>
                            <small class="text-muted">Vendeurs Actifs</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-success text-white rounded-circle p-3 me-3">
                            <i class="fas fa-box-open fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">156</h5>
                            <small class="text-muted">Produits En Ligne</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning text-white rounded-circle p-3 me-3">
                            <i class="fas fa-truck-loading fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">12</h5>
                            <small class="text-muted">Expéditions en Attente</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-info text-white rounded-circle p-3 me-3">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">84</h5>
                            <small class="text-muted">Commandes du Jour</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Vendeurs en Attente d'Approbation</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=J+Dupont&background=random" class="rounded-circle me-2" width="40" height="40">
                            <div>
                                <div class="fw-bold">Jean Dupont</div>
                                <small class="text-muted">Ogooué-Lolo</small>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-success me-1">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=M+Kwame&background=random" class="rounded-circle me-2" width="40" height="40">
                            <div>
                                <div class="fw-bold">Marie Kwame</div>
                                <small class="text-muted">Woleu-Ntem</small>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-success me-1">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Produits à Expédier</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fw-bold">Miel d'Ogooué-Ivindo</div>
                            <small class="text-muted">Quantité: 5 unités</small>
                        </div>
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-truck me-1"></i> Organiser
                        </button>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">Café de Ngounié</div>
                            <small class="text-muted">Quantité: 10 paquets</small>
                        </div>
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-truck me-1"></i> Organiser
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>