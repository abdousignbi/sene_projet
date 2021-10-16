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


      
<div class="container "  style="width:60%; height:800px;background-image:url('img/29.jpeg');">      
      <div class="container ">
      <h3 class="abdou" style="margin-left:25%;color:#f17503;margin-top:-10%;">Ajouter un produit</h3>
      <form   action="<?= WEB_ROUTE ?>" method="POST" > 
                    <input type="hidden" name="controllers" value="produit">
                    <input type="hidden" name="action" value="<?=!isset($produit['id_produit']) ? 'add.produit' : 'modification' ?>">
                    <input type="hidden" name="id_produit" value="<?=isset($produit['id_produit']) ? $produit['id_produit'] : '' ;?>">
      <div class="row">
              <div class="col md-3">
              <div class="form-group">
                <label for="">description</label>
                <input type="text" name="description" id="" class="form-control"
                value="<?= isset($_POST['appliquer'])&& isset($_POST['description'])? $_POST['description']:'';?>
                <?= isset($produit['description']) ? $produit['description'] : '' ;?>" 
                placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text" class="text" style="color:#f17503;">
                <?= isset($arrayError['description']) ? $arrayError['description'] : '' ;?>
                </small>
              </div>
              </div>  
           </div> 
           

         <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                  <label for="">id_categorie</label>
                  <select class="form-control" name="id_categorie" id="ok">
                    <?php foreach ($categories as $categorie):?>
                    <option value="<?=$categorie['id_categorie'] ?> 
                    <?= isset($produit['id_categorie']) ? $produit['id_categorie'] : '';?>">
                    <?=$categorie['nom_categorie'] ?></option>  
                    <?php endforeach ?>
                    <small>
                   
                    </small>
                  </select>

                </div>
            </div>
             

            <div class="col-md-6">
            <div class="form-group">
                  <label for="">id_sous_categorie</label>
                  <select class="form-control" name="id_sous_categorie" id="ok">
                    <?php foreach ($sous_categories as $sous_categorie):?>
                    <option value="<?=$sous_categorie['id_sous_categorie'] ?>
                    <?= isset($produit['id_sous_categorie']) ? $produit['id_sous_categorie'] : '';?>">
                    <?=$sous_categorie['nom_sous_categorie'] ?></option>
                    <?php endforeach ?>
                    <small>
                 
                  </select>
                </div>
            </div> 
         </div>


          <div class="row">
              <div class="col md-3">
                   <div class="form-group mt-5">
                    <label for="">prix_unitaire</label>
                    <input type="text" name="prix_unitaire" id="" class="form-control"
                    value="<?= isset($_POST['appliquer'])&& isset($_POST['prix_unitaire'])? $_POST['prix_unitaire']:'';?>
                    <?= isset($produit['prix_unitaire']) ? $produit['prix_unitaire'] : '' ;?>" 
                     placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text" style="color:#f17503;">
                    <?= isset($arrayError['prix_unitaire']) ? $arrayError['prix_unitaire'] : '' ;?>
                    </small>
                  </div>
              </div>   


              <div class="col md-6">
                  <div class="form-group mt-5">
                    <label for="password">quantite_stock</label>
                    <input type="text" name="quantite_stock" id="change" class="form-control" 
                    value="<?= isset($_POST['appliquer'])&& isset($_POST['quantite_stock'])? $_POST['quantite_stock']:'';?>
                    <?= isset($produit['quantite_stock']) ? $produit['quantite_stock'] : '' ;?>"
                    placeholder="" aria-describedby="helpId" >
                    <small id="helpId" class="text" style="color:#f17503;" >
                    <?= isset($arrayError['quantite_stock']) ? $arrayError['quantite_stock'] : '' ;?>
                    </small>
                 </div>
               </div>
             </div>



          <div class="row">
              <div class="col md-3">
                   <div class="form-group mt-5">
                    <label for="">nombre_image</label>
                    <input type="text" name="nombre_image" id="" class="form-control" 
                    value="<?= isset($_POST['appliquer'])&& isset($_POST['nombre_image'])? $_POST['nombre_image']:'';?>
                    <?= isset($_POST['nombre_image']) ? $_POST['nombre_image'] : '' ;?>"
                    placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text" style="color:#f17503;">
                    <?= isset($arrayError['nombre_image']) ? $arrayError['nombre_image'] : '' ;?>
                    </small>
                  </div>
              </div>   


              <div class="col md-6">
              <button type="submit" name="appliquer" class="btn" 
                        style="margin-left:70%;margin-top:24%; 
                        background:#f17503; color:white;">Appliquer</button>
               </div>
             </div>
             
                    </div>

             <div class="row">
              <div class="col md-3">
              <?php for ($i=1; $i <= $_SESSION['nombre_image']; $i++) :?>
              <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" name="avatar[]" id="" class="form-control" 
                placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text" class="text" style="color:#f17503;">
                </small>
              </div>
              <?php endfor ?>
              </div>  
           </div> 


                   <div class="button" >
                        <button type="submit" name="submit" class="btn btn" 
                        style="width:450px;margin-left:15%; margin-top:2%; 
                        background:#f17503; color:white;"><?=!isset($produit['id_produit']) ? 'Ajouter' : 'modification' ?></button>
                    </div>

                    </form>
</div>     
</div>
</div>


<?php 
  require(ROUTE_DIR.'public/inc/footer.html.php');
?>




