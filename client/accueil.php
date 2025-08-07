<?php
require_once '../includes/auth.php';
?>
<?php include '../includes/header.php'; ?>

<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Découvrez les trésors des provinces gabonaises</h1>
                <p class="lead">Artisanat local, produits frais et spécialités régionales livrés à Libreville</p>
                <a href="produits.php" class="btn btn-light btn-lg mt-3">Explorer les produits <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://images.unsplash.com/photo-1562967916-eb82221dfb92?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Produits du Gabon" class="img-fluid rounded" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Produits populaires</h2>
        <a href="produits.php" class="btn btn-link">Voir plus <i class="fas fa-chevron-right"></i></a>
    </div>
    
    <div class="row g-4">
        <div class="col-md-3">
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
        <div class="col-md-3">
            <div class="product-card">
                <span class="province-badge">Ngounié</span>
                <img src="https://images.unsplash.com/photo-1598964355495-15a3aa9084c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Café" class="product-image w-100">
                <div class="product-title">Café arabica des hauts plateaux</div>
                <div class="product-province">Province: Ngounié</div>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="ms-1">(18)</span>
                </div>
                <div class="product-price">7 800 XAF</div>
                <div class="prime-badge">
                    <i class="fas fa-truck"></i> Livraison GRATUITE à Libreville
                </div>
                <button class="btn btn-amazon w-100">Ajouter au panier</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <span class="province-badge">Woleu-Ntem</span>
                <img src="https://images.unsplash.com/photo-1603569283847-aa295f0d016a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Artisanat" class="product-image w-100">
                <div class="product-title">Sculpture en bois d'ébène traditionnelle</div>
                <div class="product-province">Province: Woleu-Ntem</div>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="ms-1">(32)</span>
                </div>
                <div class="product-price">24 900 XAF</div>
                <div class="prime-badge">
                    <i class="fas fa-truck"></i> Livraison GRATUITE à Libreville
                </div>
                <button class="btn btn-amazon w-100">Ajouter au panier</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <span class="province-badge">Ogooué-Maritime</span>
                <img src="https://images.unsplash.com/photo-1606923829579-0cb981a83e2e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Poisson" class="product-image w-100">
                <div class="product-title">Poisson fumé traditionnel</div>
                <div class="product-province">Province: Ogooué-Maritime</div>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <span class="ms-1">(15)</span>
                </div>
                <div class="product-price">3 200 XAF</div>
                <div class="prime-badge">
                    <i class="fas fa-truck"></i> Livraison GRATUITE à Libreville
                </div>
                <button class="btn btn-amazon w-100">Ajouter au panier</button>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-primary text-white rounded-circle p-4 d-inline-block mb-3">
                        <i class="fas fa-map-marked-alt fa-3x"></i>
                    </div>
                    <h3>Produits de toutes les provinces</h3>
                    <p>Découvrez des produits uniques provenant des 9 provinces du Gabon, sans quitter Libreville.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-success text-white rounded-circle p-4 d-inline-block mb-3">
                        <i class="fas fa-hands-helping fa-3x"></i>
                    </div>
                    <h3>Soutien aux producteurs locaux</h3>
                    <p>En achetant sur notre plateforme, vous soutenez directement les artisans et producteurs gabonais.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-warning text-white rounded-circle p-4 d-inline-block mb-3">
                        <i class="fas fa-truck fa-3x"></i>
                    </div>
                    <h3>Livraison fiable</h3>
                    <p>Nous assurons la livraison de tous les produits à notre point de retrait à Libreville.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>