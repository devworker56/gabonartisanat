<?php
require_once '../includes/auth.php';
?>
<?php include '../includes/header.php'; ?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-search me-2"></i> Tous les produits</h1>
        <div class="d-flex">
            <div class="input-group me-2" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Rechercher des produits...">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <button class="btn btn-outline-secondary">
                <i class="fas fa-filter me-1"></i> Filtres
            </button>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Filtrer par province</h6>
                </div>
                <div class="card-body">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="all-provinces" checked>
                        <label class="form-check-label" for="all-provinces">Toutes les provinces</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="estuaire">
                        <label class="form-check-label" for="estuaire">Estuaire</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="haut-ogooue">
                        <label class="form-check-label" for="haut-ogooue">Haut-Ogooué</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="moyen-ogooue">
                        <label class="form-check-label" for="moyen-ogooue">Moyen-Ogooué</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="ngounie">
                        <label class="form-check-label" for="ngounie">Ngounié</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="nyanga">
                        <label class="form-check-label" for="nyanga">Nyanga</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="ogooue-ivindo">
                        <label class="form-check-label" for="ogooue-ivindo">Ogooué-Ivindo</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="ogooue-lolo">
                        <label class="form-check-label" for="ogooue-lolo">Ogooué-Lolo</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="ogooue-maritime">
                        <label class="form-check-label" for="ogooue-maritime">Ogooué-Maritime</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="woleu-ntem">
                        <label class="form-check-label" for="woleu-ntem">Woleu-Ntem</label>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Filtrer par catégorie</h6>
                </div>
                <div class="card-body">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="all-categories" checked>
                        <label class="form-check-label" for="all-categories">Toutes catégories</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="alimentation">
                        <label class="form-check-label" for="alimentation">Alimentation</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="artisanat">
                        <label class="form-check-label" for="artisanat">Artisanat</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="textile">
                        <label class="form-check-label" for="textile">Textile</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cosmetiques">
                        <label class="form-check-label" for="cosmetiques">Cosmétiques</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="produits-frais">
                        <label class="form-check-label" for="produits-frais">Produits frais</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <span class="me-3">Trier par:</span>
                    <select class="form-select" style="width: 200px;">
                        <option>Pertinence</option>
                        <option>Prix: croissant</option>
                        <option>Prix: décroissant</option>
                        <option>Meilleures notes</option>
                        <option>Nouveautés</option>
                    </select>
                </div>
                <div>
                    <span class="text-muted">156 produits trouvés</span>
                </div>
            </div>
            
            <div class="row g-4">
                <?php for ($i = 0; $i < 9; $i++): ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <span class="province-badge">Ogooué-Ivindo</span>
                        <img src="https://images.unsplash.com/photo-1553456552-8e4d7c5c1ce0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Miel" class="product-image w-100">
                        <div class="product-title">Miel sauvage pur de la forêt gabonaise</div>
                        <div class="product-province">Province: Ogooué-Ivindo</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">(24)</span>
                        </div>
                        <div class="product-price">5 500 XAF</div>
                        <div class="prime-badge">
                            <i class="fas fa-truck"></i> Livraison GRATUITE à Libreville
                        </div>
                        <button class="btn btn-amazon w-100">Ajouter au panier</button>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            
            <nav aria-label="Page navigation" class="mt-5">
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
    </div>
</div>

<?php include '../includes/footer.php'; ?>