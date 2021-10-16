<?php 
require(ROUTE_DIR.'public/inc/header.html.php');
?>

  <?php 
  require(ROUTE_DIR.'public/inc/menu.html.php');
  ?>

<div class="container-fluid">

<div class="row">
            <div class="col-md-3">
          <div class="dropdown">
          <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            UPDATE
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=categorie&views=lister.categorie'?>">liste des categories</a>
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=produit&views=lister.produit'?>">listes des produit</a>
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie'?>">listes des sous categories</a>
            </div>
          </div>
          </div>
            </div>

            <div class="row">
            <div class="col-md-3">
          <div class="dropdown" >
          <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ADD
          </button>
          <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=produit&views=add.produit'?>">Ajouter produit</a>
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=categorie&views=add.categorie'?>">ajouter categorie</a>
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=sous.categorie&views=add.sous.categorie'?>">Ajouter sous categories</a>
            </div>
          </div>
          </div>
            </div>
           
            <div class="row">
            <div class="col-md-3">
          <div class="dropdown">
          <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            FILTRE
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=commande&views=filtrer.commande'?>">Filter commande</a>
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=livraison&views=filtrer.livraison'?>">Filtrer livraison</a>
            </div>
          </div>
          </div>
            </div>
            <a class="dropdown-item" href="<?= WEB_ROUTE.'?controllers=user&views=tableaubord'?>">tableau de bord</a>



<div class="row" style="margin-left:30%; margin-top:-10%;">
  <div class="col md-8">

<h3>Les commandes en cours</h3>
<div class="progress">
    
  <div class="progress-bar " role="progressbar" style="width: <?=count($commandes).'%'?>;background-color:#f17503; height:40px;" aria-valuenow="<?=count($commandes)?>" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h3>Les livraisons de la journee</h3>
<div class="progress">
  <div class="progress-bar " role="progressbar" style="width:<?=count($livraisons).'%'?>;background-color:#f17503;" aria-valuenow="<?=count($livraisons)?>" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h3>Les produits en rupture d'stock</h3>
<div class="progress">
  <div class="progress-bar " role="progressbar" style="width: <?=count($produits).'%'?>;background-color:#f17503;" aria-valuenow="<?=count($produits)?>" aria-valuemin="" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>

<?php 
require(ROUTE_DIR.'public/inc/footer.html.php');
?>