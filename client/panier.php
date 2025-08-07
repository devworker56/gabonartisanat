<?php
require_once '../includes/auth.php';
protectPage('client');
?>
<?php include '../includes/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-shopping-basket me-2"></i> Votre panier (3 articles)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80" class="img-thumbnail me-3" width="80">
                                            <div>
                                                <h6 class="mb-0">Miel sauvage pur</h6>
                                                <small class="text-muted">Province: Ogooué-Ivindo</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>5 500 XAF</td>
                                    <td>
                                        <select class="form-select" style="width: 80px;">
                                            <option>1</option>
                                            <option selected>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td>11 000 XAF</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80" class="img-thumbnail me-3" width="80">
                                            <div>
                                                <h6 class="mb-0">Café arabica</h6>
                                                <small class="text-muted">Province: Ngounié</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>7 800 XAF</td>
                                    <td>
                                        <select class="form-select" style="width: 80px;">
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td>7 800 XAF</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80" class="img-thumbnail me-3" width="80">
                                            <div>
                                                <h6 class="mb-0">Poisson fumé</h6>
                                                <small class="text-muted">Province: Ogooué-Maritime</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>3 200 XAF</td>
                                    <td>
                                        <select class="form-select" style="width: 80px;">
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td>3 200 XAF</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="produits.php" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-1"></i> Continuer vos achats
                        </a>
                        <button class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Vider le panier
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-truck me-2"></i> Options de livraison</h5>
                </div>
                <div class="card-body">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="delivery" id="pickup" checked>
                        <label class="form-check-label" for="pickup">
                            <strong>Retrait à notre centre de distribution</strong><br>
                            <small>123 Avenue du Commerce, Libreville</small><br>
                            <small class="text-success">Gratuit</small>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="delivery" id="home-delivery">
                        <label class="form-check-label" for="home-delivery">
                            <strong>Livraison à domicile</strong><br>
                            <small>Dans toute la ville de Libreville</small><br>
                            <small class="text-success">2 500 XAF</small>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-receipt me-2"></i> Récapitulatif de commande</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sous-total (3 articles)</span>
                        <span>22 000 XAF</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Frais de livraison</span>
                        <span>0 XAF</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total</strong>
                        <strong>22 000 XAF</strong>
                    </div>
                    
                    <button class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-lock me-1"></i> Passer la commande
                    </button>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Les produits seront disponibles au retrait dans 3-5 jours ouvrables.
                    </div>
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-body">
                    <h6 class="mb-3"><i class="fas fa-shield-alt me-2"></i> Paiement sécurisé</h6>
                    <div class="d-flex flex-wrap">
                        <img src="https://via.placeholder.com/40" class="me-2 mb-2" width="40">
                        <img src="https://via.placeholder.com/40" class="me-2 mb-2" width="40">
                        <img src="https://via.placeholder.com/40" class="me-2 mb-2" width="40">
                        <img src="https://via.placeholder.com/40" class="me-2 mb-2" width="40">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>