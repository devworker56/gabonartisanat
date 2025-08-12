<?php
require_once __DIR__ . '/../includes/auth.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Marché Provincial Gabonais'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Top Navigation - Amazon style -->
    <nav class="navbar navbar-expand-lg navbar-amazon">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <div class="logo">MP<span>G</span></div>
            </a>
            
            <div class="d-flex align-items-center">
                <div class="search-bar d-flex">
                    <select class="form-select rounded-0" style="width: auto;">
                        <option>Toutes</option>
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
                    <input type="text" class="form-control rounded-0" placeholder="Rechercher des produits...">
                    <button class="btn btn-orange">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
                <div class="d-flex ms-3">
                    <a href="../client/panier.php" class="cart-btn">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span class="cart-count">3</span>
                    </a>
                    
                    <?php if (isLoggedIn()): ?>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i> Bonjour, <?php echo $_SESSION['user_name']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../client/compte.php"><i class="fas fa-user me-2"></i>Mon compte</a></li>
                            <li><a class="dropdown-item" href="../client/commandes.php"><i class="fas fa-box me-2"></i>Mes commandes</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../includes/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                        </ul>
                    </div>
                    <?php else: ?>
                    <a href="../connexion.php" class="nav-link">
                        <i class="fas fa-sign-in-alt me-1"></i> Connexion
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Sub Navigation -->
    <div class="sub-nav">
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-map-marker-alt me-1"></i> Livraison à Libreville
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bars me-1"></i> Toutes les provinces
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Estuaire</a></li>
                        <li><a class="dropdown-item" href="#">Haut-Ogooué</a></li>
                        <li><a class="dropdown-item" href="#">Moyen-Ogooué</a></li>
                        <li><a class="dropdown-item" href="#">Ngounié</a></li>
                        <li><a class="dropdown-item" href="#">Nyanga</a></li>
                        <li><a class="dropdown-item" href="#">Ogooué-Ivindo</a></li>
                        <li><a class="dropdown-item" href="#">Ogooué-Lolo</a></li>
                        <li><a class="dropdown-item" href="#">Ogooué-Maritime</a></li>
                        <li><a class="dropdown-item" href="#">Woleu-Ntem</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-percent me-1"></i> Promotions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-gift me-1"></i> Nouveaux produits
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-truck me-1"></i> Suivi de commande
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="container my-3">
        <?php displayFlashMessage(); ?>
    </div>