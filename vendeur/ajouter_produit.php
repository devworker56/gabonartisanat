<?php
require_once '../includes/auth.php';
protectPage('vendeur');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Ajouter un Nouveau Produit</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom du Produit</label>
                        <input type="text" class="form-control" placeholder="Ex: Miel pur d'Ogooué-Ivindo">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Catégorie</label>
                        <select class="form-select">
                            <option>Alimentation</option>
                            <option>Artisanat</option>
                            <option>Textile</option>
                            <option>Cosmétiques</option>
                            <option>Produits frais</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Province d'origine</label>
                        <select class="form-select">
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
                        <label class="form-label">Prix (XAF)</label>
                        <input type="number" class="form-control" placeholder="Ex: 5500">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Quantité en stock</label>
                        <input type="number" class="form-control" placeholder="Ex: 50">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description du Produit</label>
                    <textarea class="form-control" rows="4" placeholder="Décrivez votre produit en détail..."></textarea>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Images du Produit</label>
                    <div class="border rounded p-3 text-center">
                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                        <p class="mb-0">Glissez-déposez les images ici ou <a href="#">parcourir</a></p>
                        <small class="text-muted">Formats acceptés: JPG, PNG (max 5MB)</small>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="border p-2 me-2">
                            <img src="https://via.placeholder.com/80" class="img-thumbnail" width="80">
                        </div>
                        <div class="border p-2 me-2">
                            <img src="https://via.placeholder.com/80" class="img-thumbnail" width="80">
                        </div>
                        <div class="border p-2">
                            <img src="https://via.placeholder.com/80" class="img-thumbnail" width="80">
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-outline-secondary me-2">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>