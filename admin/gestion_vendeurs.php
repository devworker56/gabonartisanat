<?php
require_once '../includes/auth.php';
protectPage('admin');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1><i class="fas fa-users me-2"></i> Gestion des Vendeurs</h1>
            <small>Approbation et gestion des comptes vendeurs</small>
        </div>
        <div class="d-flex">
            <div class="input-group me-2" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Rechercher vendeur...">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <button class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Ajouter
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nom</th>
                    <th>Province</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Paul Mba</td>
                    <td>Estuaire</td>
                    <td>paul.mba@example.com</td>
                    <td>+241 77 12 34 56</td>
                    <td><span class="badge bg-success">Approuvé</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-ban"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Sophie Nzeng</td>
                    <td>Haut-Ogooué</td>
                    <td>sophie.nzeng@example.com</td>
                    <td>+241 66 98 76 54</td>
                    <td><span class="badge bg-warning">En attente</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-success me-1">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Thomas Ondo</td>
                    <td>Ogooué-Maritime</td>
                    <td>thomas.ondo@example.com</td>
                    <td>+241 60 12 34 56</td>
                    <td><span class="badge bg-success">Approuvé</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-ban"></i>
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