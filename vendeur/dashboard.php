<?php
require_once '../includes/auth.php';
protectPage('vendeur');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1><i class="fas fa-tachometer-alt me-2"></i> Tableau de Bord Vendeur</h1>
            <small>Bienvenue, <?php echo $_SESSION['user_name']; ?></small>
        </div>
        <div>
            <button class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-download me-1"></i> Exporter Rapport
            </button>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card seller-dashboard-card border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-box me-2"></i> Produits
                </div>
                <div class="card-body text-center">
                    <div class="seller-stats-number text-primary">24</div>
                    <p>Produits en vente</p>
                    <a href="mes_produits.php" class="btn btn-sm btn-outline-primary">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card seller-dashboard-card border-success">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-shopping-cart me-2"></i> Commandes
                </div>
                <div class="card-body text-center">
                    <div class="seller-stats-number text-success">18</div>
                    <p>Commandes ce mois</p>
                    <a href="commandes.php" class="btn btn-sm btn-outline-success">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card seller-dashboard-card border-warning">
                <div class="card-header bg-warning text-dark">
                    <i class="fas fa-truck me-2"></i> Livraisons
                </div>
                <div class="card-body text-center">
                    <div class="seller-stats-number text-warning">5</div>
                    <p>En attente d'expédition</p>
                    <a href="commandes.php" class="btn btn-sm btn-outline-warning">Suivre</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card seller-dashboard-card border-info">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-money-bill-wave me-2"></i> Revenus
                </div>
                <div class="card-body text-center">
                    <div class="seller-stats-number text-info">452 500 XAF</div>
                    <p>Gains ce mois</p>
                    <a href="#" class="btn btn-sm btn-outline-info">Détails</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Dernières Commandes</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CMD-2023-845</td>
                            <td>Jean Nkoghe</td>
                            <td>12/09/2023</td>
                            <td>24 500 XAF</td>
                            <td><span class="badge bg-success">Livré</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>CMD-2023-839</td>
                            <td>Marie Obiang</td>
                            <td>10/09/2023</td>
                            <td>18 700 XAF</td>
                            <td><span class="badge bg-warning">En cours</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>CMD-2023-827</td>
                            <td>Luc Meye</td>
                            <td>08/09/2023</td>
                            <td>32 000 XAF</td>
                            <td><span class="badge bg-danger">Annulé</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>