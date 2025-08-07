<?php
require_once '../includes/auth.php';
protectPage('admin');
?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Paramètres</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-cog me-2"></i> Général
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-percentage me-2"></i> Commissions
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-truck me-2"></i> Livraisons
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-envelope me-2"></i> Notifications
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-users me-2"></i> Rôles utilisateurs
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i> Paramètres Généraux</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nom de la plateforme</label>
                            <input type="text" class="form-control" value="Marché Provincial Gabonais">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email de contact</label>
                            <input type="email" class="form-control" value="contact@marcheprovincial.ga">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Téléphone de contact</label>
                            <input type="tel" class="form-control" value="+241 01 23 45 67">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Adresse</label>
                            <textarea class="form-control" rows="3">Avenue du Commerce, Libreville, Gabon</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control">
                            <small class="text-muted">Formats acceptés: JPG, PNG (max 2MB)</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Favicon</label>
                            <input type="file" class="form-control">
                            <small class="text-muted">Format: ICO (16x16px ou 32x32px)</small>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="maintenance" checked>
                            <label class="form-check-label" for="maintenance">Mode maintenance</label>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-secondary me-2">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>