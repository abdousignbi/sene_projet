<?php
if (isset($_REQUEST['controllers'])){
    if ($_REQUEST['controllers']=='security'){
        require_once(ROUTE_DIR. 'controllers/security.php');
    }elseif($_REQUEST['controllers']== 'user'){
      require_once(ROUTE_DIR. 'controllers/user.controller.php');
     } elseif($_REQUEST['controllers']=='produit'){
        require_once(ROUTE_DIR. 'controllers/produit.controller.php');
    }elseif($_REQUEST['controllers']=='image'){
       require_once(ROUTE_DIR. 'controllers/image.controller.php');
    }elseif($_REQUEST['controllers']=='livraison'){
        require_once(ROUTE_DIR. 'controllers/livraison.controller.php');
     }elseif($_REQUEST['controllers']=='commande'){
        require_once(ROUTE_DIR. 'controllers/commande.controller.php');
     }elseif($_REQUEST['controllers']=='sous.categorie'){
        require_once(ROUTE_DIR. 'controllers/sous.categorie.controller.php');
     }elseif($_REQUEST['controllers']=='categorie'){
        require_once(ROUTE_DIR. 'controllers/categorie.controller.php');
     }elseif($_REQUEST['controllers']=='role'){
        require_once(ROUTE_DIR. 'controllers/role.controller.php');
     }else{
        require_once(ROUTE_DIR. 'controllers/user.controller.php');
     }
}else{
   // require_once(ROUTE_DIR.'views/security/erreur.html.php');
    require_once(ROUTE_DIR.'controllers/user.controller.php');
      //require_once(ROUTE_DIR. 'views/security/connexion.html.php');
}
?>