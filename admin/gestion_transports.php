<?php
require_once '../includes/auth.php';
protectPage('admin');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1><i class="fas fa-truck me-2"></i> Gestion des Transports</h1>
            <small>Organisation des livraisons interprovinciales</small>
        </div>
        <div class="d-flex">
            <div class="input-group me-2" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Rechercher transport...">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <button class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Nouveau Transport
            </button>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-4">
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
        <div class="col-md-4">
            <select class="form-select">
                <option>Tous les statuts</option>
                <option>En préparation</option>
                <option>En transit</option>
                <option>Livré</option>
                <option>Retardé</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-outline-secondary w-100">
                <i class="fas fa-filter me-1"></i> Filtrer
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>N° Transport</th>
                    <th>Province</th>
                    <th>Date départ</th>
                    <th>Date arrivée</th>
                    <th>Nbre produits</th>
                    <th>Transporteur</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>TR-2023-845</td>
                    <td>Ogooué-Ivindo</td>
                    <td>15/09/2023</td>
                    <td>18/09/2023</td>
                    <td>24</td>
                    <td>TransGabon Express</td>
                    <td><span class="badge bg-success">Livré</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-print"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>TR-2023-846</td>
                    <td>Ngounié</td>
                    <td>16/09/2023</td>
                    <td>19/09/2023</td>
                    <td>18</td>
                    <td>Rapide Transport</td>
                    <td><span class="badge bg-primary">En transit</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-print"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>TR-2023-847</td>
                    <td>Woleu-Ntem</td>
                    <td>17/09/2023</td>
                    <td>20/09/2023</td>
                    <td>12</td>
                    <td>Nord Express</td>
                    <td><span class="badge bg-warning">En préparation</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-print"></i>
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