<?php
require_once '../includes/auth.php';
protectPage('vendeur');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1><i class="fas fa-boxes me-2"></i> Mes Produits</h1>
            <small>Tous les produits que vous avez ajoutés à la plateforme</small>
        </div>
        <div>
            <a href="ajouter_produit.php" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Ajouter un produit
            </a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="https://via.placeholder.com/50" class="img-thumbnail" width="50"></td>
                    <td>Miel sauvage pur</td>
                    <td>Alimentation</td>
                    <td>5 500 XAF</td>
                    <td>24</td>
                    <td><span class="badge bg-success">Actif</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://via.placeholder.com/50" class="img-thumbnail" width="50"></td>
                    <td>Sculpture en bois</td>
                    <td>Artisanat</td>
                    <td>24 900 XAF</td>
                    <td>5</td>
                    <td><span class="badge bg-warning">En attente</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://via.placeholder.com/50" class="img-thumbnail" width="50"></td>
                    <td>Tissu traditionnel</td>
                    <td>Textile</td>
                    <td>12 500 XAF</td>
                    <td>15</td>
                    <td><span class="badge bg-success">Actif</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Précédent</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Suivant</a>
            </li>
        </ul>
    </nav>
</div>

<?php include '../includes/footer.php'; ?>