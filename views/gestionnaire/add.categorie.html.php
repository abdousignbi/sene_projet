<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  
}
?>

<?php 
require(ROUTE_DIR.'public/inc/header.html.php');
?>

  <?php 
  require(ROUTE_DIR.'public/inc/menu.html.php');
?>
 
<div class="container-fluid bg-light">

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


      
<div class="container "  style="width:50%;height:400px;background-image:url('img/29.jpeg');">      
    <div class="container ">
        <h3 class="abdou" style="margin-left:25%;color:#f17503;margin-top:-10%;">Ajouter une sous categorie</h3>
        
      <form   action="<?= WEB_ROUTE ?>" method="POST"  enctype= »multipart/form-data » > 
                    <input type="hidden" name="controllers" value="categorie">
                    <input type="hidden" name="action" value="<?=!isset($categorie['id_categorie']) ? 'add.categorie' : 'modification' ?>">
                    <input type="hidden" name="id_categorie" value="<?=isset($categorie['id_categorie']) ? $categorie['id_categorie'] : '' ;?>">

 
           <div class="row">
              <div class="col md-3">
              <div class="form-group">
                  <label for="">nom_categorie</label>
                  <input type="text" class="form-control"  
                   value="<?= isset($categorie['nom_categorie']) ? $categorie['nom_categorie'] : '' ;?>"
                  name="nom_categorie" id="ok">
                  <small id="helpId" class="text" class="text" style="color:#f17503;" 
                 >
                  <?= isset($arrayError['nom_categorie']) ? $arrayError['nom_categorie'] : '' ;?>
                    </small>
                </div>
              </div>  
           </div>

            
                   <div class="button" >
                        <button type="submit" name="submit" class="btn" 
                        style="width:450px;margin-left:15%; margin-top:8%; 
                        background:#f17503; color:white;"><?=!isset($categorie['id_categorie']) ? 'Ajouter' : 'modification' ?></button>
                      </div>

     </form>
</div>     
</div>
</div>

<?php 
  require(ROUTE_DIR.'public/inc/footer.html.php');
?>