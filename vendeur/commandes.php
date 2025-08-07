<?php
require_once '../includes/auth.php';
protectPage('vendeur');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1><i class="fas fa-clipboard-list me-2"></i> Mes Commandes</h1>
            <small>Toutes les commandes passées pour vos produits</small>
        </div>
        <div class="d-flex">
            <div class="input-group me-2" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Rechercher commande...">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <button class="btn btn-outline-primary">
                <i class="fas fa-filter me-1"></i> Filtrer
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>N° Commande</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Produits</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CMD-2023-845</td>
                    <td>12/09/2023</td>
                    <td>Jean Nkoghe</td>
                    <td>2</td>
                    <td>24 500 XAF</td>
                    <td><span class="badge bg-success">Livré</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>CMD-2023-839</td>
                    <td>10/09/2023</td>
                    <td>Marie Obiang</td>
                    <td>3</td>
                    <td>18 700 XAF</td>
                    <td><span class="badge bg-warning">En cours</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>CMD-2023-827</td>
                    <td>08/09/2023</td>
                    <td>Luc Meye</td>
                    <td>1</td>
                    <td>32 000 XAF</td>
                    <td><span class="badge bg-danger">Annulé</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
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