<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Marché Provincial Gabonais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Contactez-nous</h2>
                <p>Nous sommes là pour répondre à vos questions et préoccupations.</p>
                
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nom complet</label>
                        <input type="text" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Sujet</label>
                        <select class="form-select">
                            <option>Question générale</option>
                            <option>Problème avec une commande</option>
                            <option>Demande pour devenir vendeur</option>
                            <option>Feedback/suggestion</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Envoyer le message</button>
                </form>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations de contact</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i> 
                                <strong>Adresse:</strong> Avenue du Commerce, Libreville, Gabon
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-phone me-2"></i> 
                                <strong>Téléphone:</strong> +241 01 23 45 67
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-envelope me-2"></i> 
                                <strong>Email:</strong> contact@marcheprovincial.ga
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-clock me-2"></i> 
                                <strong>Heures d'ouverture:</strong> Lundi-Vendredi, 8h-17h
                            </li>
                        </ul>
                        
                        <div class="mt-4">
                            <h6>Suivez-nous</h6>
                            <a href="#" class="me-3 text-decoration-none"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="#" class="me-3 text-decoration-none"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#" class="me-3 text-decoration-none"><i class="fab fa-instagram fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>