<?php
require_once '../includes/auth.php';
protectPage('admin');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1><i class="fas fa-box-open me-2"></i> Gestion des Produits</h1>
            <small>Tous les produits disponibles sur la plateforme</small>
        </div>
        <div class="d-flex">
            <div class="input-group me-2" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Rechercher produit...">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <button class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Ajouter
            </button>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-3">
            <select class="form-select">
                <option>Toutes les catégories</option>
                <option>Alimentation</option>
                <option>Artisanat</option>
                <option>Textile</option>
                <option>Cosmétiques</option>
                <option>Produits frais</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option>Toutes les provinces</option>
                <option>Estuaire</option>
                <option>Haut-Ogooué</option>
                <option>Moyen-Ogooué</option>
                <option>Ngounié</option>
                <option>Nyanga</option>
                <option>Ogooué-Ivindo</option>
                <option>Ogooué-Lolo</option>
                <option>Ogooué-Maritime</option>
                <option>Woleu-Ntem</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option>Tous les statuts</option>
                <option>Actif</option>
                <option>En attente</option>
                <option>Suspendu</option>
                <option>Épuisé</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-outline-secondary w-100">
                <i class="fas fa-filter me-1"></i> Filtrer
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Vendeur</th>
                    <th>Province</th>
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
                    <td>Paul Mba</td>
                    <td>Ogooué-Ivindo</td>
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
                    <td>Café arabica</td>
                    <td>Sophie Nzeng</td>
                    <td>Ngounié</td>
                    <td>7 800 XAF</td>
                    <td>0</td>
                    <td><span class="badge bg-danger">Épuisé</span></td>
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
                    <td>Thomas Ondo</td>
                    <td>Woleu-Ntem</td>
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