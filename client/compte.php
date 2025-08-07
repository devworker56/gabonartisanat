<?php
require_once '../includes/auth.php';
protectPage('client');
?>
<?php include '../includes/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=random" class="rounded-circle mb-3" width="150">
                    <h5><?php echo $_SESSION['user_name']; ?></h5>
                    <p class="text-muted">Membre depuis: Septembre 2023</p>
                    
                    <div class="list-group">
                        <a href="compte.php" class="list-group-item list-group-item-action active">
                            <i class="fas fa-user me-2"></i> Mon profil
                        </a>
                        <a href="commandes.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-box me-2"></i> Mes commandes
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-map-marker-alt me-2"></i> Adresses
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-lock me-2"></i> Sécurité
                        </a>
                        <a href="../includes/logout.php" class="list-group-item list-group-item-action text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-user me-2"></i> Informations personnelles</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control" value="Jean">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" value="Nkoghe">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="jean.nkoghe@example.com">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" value="+241 77 12 34 56">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" value="1985-05-15">
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-secondary me-2">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> Adresses</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Adresse principale</h6>
                                    <p class="card-text">
                                        Rue de la Paix, Quartier Louis<br>
                                        BP 1234, Libreville<br>
                                        Gabon
                                    </p>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-outline-primary me-2">Modifier</button>
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Adresse secondaire</h6>
                                    <p class="card-text">
                                        Avenue du Commerce<br>
                                        Immeuble Diamant, Appt 12<br>
                                        Libreville, Gabon
                                    </p>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-outline-primary me-2">Modifier</button>
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-plus me-1"></i> Ajouter une nouvelle adresse
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>