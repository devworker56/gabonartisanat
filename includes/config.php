<?php
// Configuration de base
define('SITE_NAME', 'Marché Provincial Gabonais');
define('SITE_URL', 'http://localhost/marche-provincial-gabonais');
define('ADMIN_EMAIL', 'admin@marcheprovincial.ga');

// Paramètres de base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'u834808878_marche_prov');
define('DB_USER', 'u834808878_Dbaccess57');
define('DB_PASS', 'Ossouka@1968');

// Paramètres de session
define('SESSION_TIMEOUT', 3600); // 1 heure en secondes

// Configuration API
define('MPG_API_KEY', 'mpg_prod_7x9A2z5c8y1B3v6Q0w4E7r8T1o5P2l6M9n');
define('TPG_API_URL', 'https://slateblue-grouse-969862.hostingersite.com/api'); // Change to your TPG domain
//define('TPG_API_URL', 'https://transport.marcheprovincial.ga/api'); // Change to your TPG domain
define('JWT_SECRET', 'mpg_jwt_4x8B1z9c3y2D5v7Q1w3E6r9T2o4P1l5M8n');

// Autres configurations
define('MAX_PRODUCT_IMAGES', 5);
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
?>