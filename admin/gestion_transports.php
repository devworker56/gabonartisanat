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
            <button id="prepareTransportBtn" class="btn btn-primary" disabled>
                <i class="fas fa-paper-plane me-1"></i> Préparer pour transport
            </button>
        </div>
    </div>
    
    <div id="transportLinkContainer" class="alert alert-success d-none">
        <strong>Lien de transport généré:</strong> 
        <a id="transportLink" href="#" target="_blank"></a>
        <button id="copyLinkBtn" class="btn btn-sm btn-outline-secondary ms-2">
            <i class="fas fa-copy"></i> Copier
        </button>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-4">
            <select class="form-select" id="provinceFilter">
                <option value="">Toutes les provinces</option>
                <option value="1">Estuaire</option>
                <option value="2">Haut-Ogooué</option>
                <option value="3">Moyen-Ogooué</option>
                <option value="4">Ngounié</option>
                <option value="5">Nyanga</option>
                <option value="6">Ogooué-Ivindo</option>
                <option value="7">Ogooué-Lolo</option>
                <option value="8">Ogooué-Maritime</option>
                <option value="9">Woleu-Ntem</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" id="statusFilter">
                <option value="">Tous les statuts</option>
                <option value="pending">En attente</option>
                <option value="ready">Prêt pour transport</option>
                <option value="in_transit">En transit</option>
                <option value="delivered">Livré</option>
            </select>
        </div>
        <div class="col-md-4">
            <button id="filterBtn" class="btn btn-outline-secondary w-100">
                <i class="fas fa-filter me-1"></i> Filtrer
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover" id="transportTable">
            <thead class="table-light">
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>ID Produit</th>
                    <th>Nom</th>
                    <th>Province</th>
                    <th>Poids (kg)</th>
                    <th>Date limite</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <!-- Will be populated by JavaScript -->
            </tbody>
        </table>
    </div>
    
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="pagination">
            <!-- Will be populated by JavaScript -->
        </ul>
    </nav>
</div>

<script>
$(document).ready(function() {
    // Load products data
    loadProducts();
    
    // Select all checkbox
    $('#selectAll').change(function() {
        $('.product-checkbox').prop('checked', $(this).prop('checked'));
        updatePrepareButton();
    });
    
    // Prepare transport button click
    $('#prepareTransportBtn').click(function() {
        const selectedProducts = [];
        $('.product-checkbox:checked').each(function() {
            selectedProducts.push($(this).data('product-id'));
        });
        
        if (selectedProducts.length === 0) return;
        
        $.ajax({
            url: '/api/transport/prepare.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ products: selectedProducts }),
            success: function(response) {
                if (response.success) {
                    $('#transportLink').attr('href', response.transport_link).text(response.transport_link);
                    $('#transportLinkContainer').removeClass('d-none');
                    loadProducts(); // Refresh the list
                }
            },
            error: function(xhr) {
                alert('Erreur: ' + xhr.responseJSON?.error || 'Une erreur est survenue');
            }
        });
    });
    
    // Copy link button
    $('#copyLinkBtn').click(function() {
        const link = $('#transportLink').attr('href');
        navigator.clipboard.writeText(link);
        $(this).html('<i class="fas fa-check"></i> Copié');
        setTimeout(() => {
            $(this).html('<i class="fas fa-copy"></i> Copier');
        }, 2000);
    });
    
    // Filter button
    $('#filterBtn').click(function() {
        loadProducts();
    });
    
    // Product checkbox change
    $(document).on('change', '.product-checkbox', function() {
        updatePrepareButton();
    });
    
    function updatePrepareButton() {
        const anyChecked = $('.product-checkbox:checked').length > 0;
        $('#prepareTransportBtn').prop('disabled', !anyChecked);
    }
    
    function loadProducts(page = 1) {
        const province = $('#provinceFilter').val();
        const status = $('#statusFilter').val();
        
        $.ajax({
            url: `/api/products/list.php?page=${page}&province=${province}&status=${status}`,
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    renderProducts(response.data.products);
                    renderPagination(response.data.total_pages, page);
                }
            },
            error: function(xhr) {
                alert('Erreur lors du chargement des produits');
            }
        });
    }
    
    function renderProducts(products) {
        const $tbody = $('#transportTable tbody');
        $tbody.empty();
        
        if (products.length === 0) {
            $tbody.append('<tr><td colspan="7" class="text-center">Aucun produit trouvé</td></tr>');
            return;
        }
        
        products.forEach(product => {
            const statusBadge = {
                'pending': 'bg-secondary',
                'ready': 'bg-info',
                'in_transit': 'bg-primary',
                'delivered': 'bg-success',
                'cancelled': 'bg-danger'
            }[product.transport_status] || 'bg-secondary';
            
            const statusText = {
                'pending': 'En attente',
                'ready': 'Prêt pour transport',
                'in_transit': 'En transit',
                'delivered': 'Livré',
                'cancelled': 'Annulé'
            }[product.transport_status] || product.transport_status;
            
            $tbody.append(`
                <tr>
                    <td><input type="checkbox" class="product-checkbox" data-product-id="${product.id}" 
                         ${product.transport_status !== 'pending' ? 'disabled' : ''}></td>
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.province_name}</td>
                    <td>${product.weight_kg}</td>
                    <td>${new Date(product.transport_deadline).toLocaleDateString()}</td>
                    <td><span class="badge ${statusBadge}">${statusText}</span></td>
                </tr>
            `);
        });
        
        updatePrepareButton();
    }
    
    function renderPagination(totalPages, currentPage) {
        const $pagination = $('#pagination');
        $pagination.empty();
        
        if (totalPages <= 1) return;
        
        // Previous button
        $pagination.append(`
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${currentPage - 1}">Précédent</a>
            </li>
        `);
        
        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            $pagination.append(`
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `);
        }
        
        // Next button
        $pagination.append(`
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${currentPage + 1}">Suivant</a>
            </li>
        `);
        
        // Pagination click handler
        $('.page-link').click(function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            if (page >= 1 && page <= totalPages) {
                loadProducts(page);
            }
        });
    }
});
</script>

<?php include '../includes/footer.php'; ?>