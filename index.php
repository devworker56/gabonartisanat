<?php
require_once '../includes/auth.php';
?>
<?php include '../includes/header.php'; ?>

<!-- Hero Banner (Original Height) -->
<div class="hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Découvrez les trésors des provinces gabonaises</h1>
                <p class="lead">Artisanat local, produits frais et spécialités régionales livrés à Libreville</p>
                <a href="#products-section" class="btn btn-light btn-lg mt-3">Explorer les produits <i class="fas fa-arrow-down ms-2"></i></a>
            </div>
            <div class="col-md-6 text-center">
                <!-- Empty column to maintain original layout -->
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container my-4" id="products-section">
    <div class="row">
        <!-- Left Side Filter Panel -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-filter me-2"></i> Filtres
                </div>
                <div class="card-body">
                    <!-- Province Filter -->
                    <div class="mb-4">
                        <h6 class="mb-3">Provinces</h6>
                        <?php
                        $provinces = [
                            'Estuaire', 'Haut-Ogooué', 'Moyen-Ogooué', 
                            'Ngounié', 'Nyanga', 'Ogooué-Ivindo', 
                            'Ogooué-Lolo', 'Ogooué-Maritime', 'Woleu-Ntem'
                        ];
                        foreach ($provinces as $province): ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input province-filter" 
                                   type="checkbox" 
                                   id="prov-<?php echo strtolower(str_replace('é', 'e', $province)); ?>" 
                                   checked>
                            <label class="form-check-label" for="prov-<?php echo strtolower(str_replace('é', 'e', $province)); ?>">
                                <?php echo $province; ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Category Filter -->
                    <div class="mb-4">
                        <h6 class="mb-3">Catégories</h6>
                        <?php
                        $categories = [
                            'Alimentation', 'Artisanat', 'Textile', 
                            'Cosmétiques', 'Produits frais'
                        ];
                        foreach ($categories as $category): ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input category-filter" 
                                   type="checkbox" 
                                   id="cat-<?php echo strtolower($category); ?>" 
                                   checked>
                            <label class="form-check-label" for="cat-<?php echo strtolower($category); ?>">
                                <?php echo $category; ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Price Range -->
                    <div class="mb-3">
                        <h6 class="mb-3">Prix (XAF)</h6>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Min" id="price-min">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Max" id="price-max">
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary w-100 mt-2" id="apply-filters">
                        <i class="fas fa-check me-1"></i> Appliquer
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Product Listing -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Tous les produits</h2>
                <div class="d-flex">
                    <div class="input-group me-2" style="width: 250px;">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <select class="form-select" style="width: auto;">
                        <option>Trier par: Pertinence</option>
                        <option>Prix: croissant</option>
                        <option>Prix: décroissant</option>
                        <option>Meilleures notes</option>
                    </select>
                </div>
            </div>
            
            <div class="row g-4">
                <?php 
                $sample_products = [
                    ['Miel sauvage pur', 'Ogooué-Ivindo', 'Alimentation', 5500, 24],
                    ['Café arabica', 'Ngounié', 'Alimentation', 7800, 18],
                    ['Sculpture en bois', 'Woleu-Ntem', 'Artisanat', 24900, 5],
                    ['Poisson fumé', 'Ogooué-Maritime', 'Produits frais', 3200, 15],
                    ['Tissu traditionnel', 'Estuaire', 'Textile', 12500, 8],
                    ['Huile de palme', 'Haut-Ogooué', 'Alimentation', 4500, 30],
                    ['Vannerie artisanale', 'Moyen-Ogooué', 'Artisanat', 8900, 12],
                    ['Savon naturel', 'Nyanga', 'Cosmétiques', 2500, 40],
                    ['Épices locales', 'Ogooué-Lolo', 'Alimentation', 3800, 25]
                ];
                
                foreach ($sample_products as $product): 
                ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <span class="province-badge"><?php echo $product[1]; ?></span>
                        <img src="https://source.unsplash.com/random/300x200/?<?php 
                            echo strtolower(explode(' ', $product[0])[0]); 
                        ?>,gabon" class="product-image w-100">
                        <div class="product-title"><?php echo $product[0]; ?></div>
                        <div class="product-province">Province: <?php echo $product[1]; ?></div>
                        <div class="product-rating">
                            <?php for ($i = 0; $i < rand(3,5); $i++): ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <span class="ms-1">(<?php echo rand(5, 50); ?>)</span>
                        </div>
                        <div class="product-price"><?php echo number_format($product[3], 0, ',', ' '); ?> XAF</div>
                        <div class="prime-badge">
                            <i class="fas fa-truck"></i> Livraison GRATUITE à Libreville
                        </div>
                        <button class="btn btn-amazon w-100">
                            <i class="fas fa-cart-plus me-1"></i> Ajouter au panier
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
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

<style>
    /* Original Banner Height */
    .hero-section {
        padding: 60px 0;
        color: white;
        margin-bottom: 30px;
    }
    
    /* Ensure filters are visible on all screens */
    @media (max-width: 768px) {
        .col-md-3 {
            margin-bottom: 20px;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    document.getElementById('apply-filters').addEventListener('click', function() {
        const selectedProvinces = [];
        document.querySelectorAll('.province-filter:checked').forEach(checkbox => {
            selectedProvinces.push(checkbox.id.replace('prov-', ''));
        });
        
        const selectedCategories = [];
        document.querySelectorAll('.category-filter:checked').forEach(checkbox => {
            selectedCategories.push(checkbox.id.replace('cat-', ''));
        });
        
        const minPrice = document.getElementById('price-min').value;
        const maxPrice = document.getElementById('price-max').value;
        
        console.log('Applied Filters:', {
            provinces: selectedProvinces,
            categories: selectedCategories,
            priceRange: { min: minPrice, max: maxPrice }
        });
        
        // In a real implementation, this would filter the product list
        alert('Filtres appliqués! (Voir console pour les détails)');
    });
});
</script>