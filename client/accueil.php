<?php
require_once '../includes/auth.php';
?>
<?php include '../includes/header.php'; ?>

<div class="hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1545156521-77bd85671d30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold">Découvrez les trésors des provinces gabonaises</h1>
                <p class="lead">Artisanat local, produits frais et spécialités régionales livrés à Libreville</p>
                <a href="#products-section" class="btn btn-light btn-lg mt-3">
                    Explorer les produits <i class="fas fa-arrow-down ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5" id="products-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-search me-2"></i> Tous les produits</h2>
        <div class="d-flex">
            <div class="input-group me-2" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Rechercher des produits..." id="product-search">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="fas fa-filter me-1"></i> Filtres
            </button>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> 
                <strong>Livraison garantie</strong> - Tous les produits seront disponibles au retrait à Libreville dans 3-5 jours ouvrables après commande.
            </div>
        </div>
    </div>
    
    <div class="row g-4">
        <?php for ($i = 0; $i < 9; $i++): ?>
        <div class="col-md-4">
            <div class="product-card">
                <span class="province-badge"><?php 
                    $provinces = ['Estuaire', 'Haut-Ogooué', 'Moyen-Ogooué', 'Ngounié', 'Nyanga', 'Ogooué-Ivindo', 'Ogooué-Lolo', 'Ogooué-Maritime', 'Woleu-Ntem'];
                    echo $provinces[$i];
                ?></span>
                <img src="https://source.unsplash.com/random/600x400/?<?php 
                    $products = ['honey', 'coffee', 'fish', 'woodcarving', 'fruits', 'vegetables', 'handicraft', 'spices', 'textile'];
                    echo $products[$i];
                ?>" alt="Produit gabonais" class="product-image w-100">
                <div class="product-title"><?php 
                    $titles = [
                        'Miel sauvage pur de la forêt gabonaise',
                        'Café arabica des hauts plateaux',
                        'Poisson fumé traditionnel',
                        'Sculpture en bois d\'ébène',
                        'Fruits tropicaux frais',
                        'Légumes biologiques',
                        'Panier tressé traditionnel',
                        'Épices locales',
                        'Tissu traditionnel imprimé'
                    ];
                    echo $titles[$i];
                ?></div>
                <div class="product-province">Province: <?php echo $provinces[$i]; ?></div>
                <div class="product-rating">
                    <?php for ($j = 0; $j < rand(3,5); $j++): ?>
                        <i class="fas fa-star"></i>
                    <?php endfor; ?>
                    <?php if (rand(0,1)): ?>
                        <i class="fas fa-star-half-alt"></i>
                    <?php endif; ?>
                    <span class="ms-1">(<?php echo rand(5, 50); ?>)</span>
                </div>
                <div class="product-price"><?php echo number_format(rand(2000, 25000), 0, ',', ' '); ?> XAF</div>
                <div class="prime-badge">
                    <i class="fas fa-truck"></i> Livraison GRATUITE à Libreville
                </div>
                <button class="btn btn-amazon w-100">
                    <i class="fas fa-cart-plus me-1"></i> Ajouter au panier
                </button>
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

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel"><i class="fas fa-filter me-2"></i>Filtres avancés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Filtrer par province</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="all-provinces" checked>
                                    <label class="form-check-label" for="all-provinces">Toutes les provinces</label>
                                </div>
                                <?php foreach ($provinces as $province): ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input province-filter" type="checkbox" id="province-<?php echo strtolower(str_replace('é', 'e', $province)); ?>">
                                    <label class="form-check-label" for="province-<?php echo strtolower(str_replace('é', 'e', $province)); ?>"><?php echo $province; ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Filtrer par catégorie</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="all-categories" checked>
                                    <label class="form-check-label" for="all-categories">Toutes catégories</label>
                                </div>
                                <?php 
                                $categories = ['Alimentation', 'Artisanat', 'Textile', 'Cosmétiques', 'Produits frais'];
                                foreach ($categories as $category): ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input category-filter" type="checkbox" id="category-<?php echo strtolower($category); ?>">
                                    <label class="form-check-label" for="category-<?php echo strtolower($category); ?>"><?php echo $category; ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="price-range" class="form-label">Fourchette de prix (XAF)</label>
                        <div class="d-flex align-items-center">
                            <input type="number" class="form-control me-2" placeholder="Min" id="price-min">
                            <span class="mx-2">à</span>
                            <input type="number" class="form-control ms-2" placeholder="Max" id="price-max">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sort-by" class="form-label">Trier par</label>
                        <select class="form-select" id="sort-by">
                            <option value="popular">Les plus populaires</option>
                            <option value="newest">Nouveautés</option>
                            <option value="price-asc">Prix: croissant</option>
                            <option value="price-desc">Prix: décroissant</option>
                            <option value="rating">Meilleures notes</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="apply-filters">Appliquer les filtres</button>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<style>
    .hero-section {
        padding: 100px 0;
        color: white;
        margin-bottom: 30px;
    }
    #products-section {
        scroll-margin-top: 100px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    document.getElementById('apply-filters').addEventListener('click', function() {
        // Implement your filter logic here
        const selectedProvinces = [];
        document.querySelectorAll('.province-filter:checked').forEach(checkbox => {
            selectedProvinces.push(checkbox.id.replace('province-', ''));
        });
        
        const selectedCategories = [];
        document.querySelectorAll('.category-filter:checked').forEach(checkbox => {
            selectedCategories.push(checkbox.id.replace('category-', ''));
        });
        
        const minPrice = document.getElementById('price-min').value;
        const maxPrice = document.getElementById('price-max').value;
        const sortBy = document.getElementById('sort-by').value;
        
        console.log('Filters applied:', {
            provinces: selectedProvinces,
            categories: selectedCategories,
            priceRange: { min: minPrice, max: maxPrice },
            sortBy: sortBy
        });
        
        // Close modal
        bootstrap.Modal.getInstance(document.getElementById('filterModal')).hide();
        
        // In a real implementation, you would make an AJAX call here
        // to fetch filtered products and update the display
    });
    
    // Search functionality
    document.getElementById('product-search').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            const searchTerm = this.value.trim();
            console.log('Searching for:', searchTerm);
            // Implement search functionality here
        }
    });
});
</script>