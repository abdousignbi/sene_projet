<?php

//lib

require_once(ROUTE_DIR.'lib/session.php');
//require_once(ROUTE_DIR.'lib/autorisation.php');
require_once(ROUTE_DIR.'lib/validator.php');
require_once(ROUTE_DIR.'lib/database.php');
require_once(ROUTE_DIR.'lib/upload.php');

//models
require_once(ROUTE_DIR.'models/user.model.php');
require_once(ROUTE_DIR.'models/produit.model.php');
require_once(ROUTE_DIR.'models/role.model.php');
require_once(ROUTE_DIR.'models/commande.model.php');
require_once(ROUTE_DIR.'models/image.model.php');
require_once(ROUTE_DIR.'models/sous.categorie.model.php');
require_once(ROUTE_DIR.'models/livraison.model.php');
require_once(ROUTE_DIR.'models/categorie.model.php');
?>