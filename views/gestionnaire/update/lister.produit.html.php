<?php 
require(ROUTE_DIR.'public/inc/header.html.php');
?>

  <?php 
  require(ROUTE_DIR.'public/inc/menu.html.php');
  ?>

  <div class="container-fluid bg-light pt-3">

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

  <div class="container "  style="width:70%;height:600px;background-image:url('img/29.jpeg');"> 
  <h3 class="abdou" style="margin-left:40%;color:#f17503;margin-top:-10%;">Liste des produits</h3>
       
        <div class="container">
            <div class="row">
               

         <div class="col-md-9" style="margin-left:10%;">

            <?php 
     $nombrePage=0;
     $precedent=0;
     $page=0;
     $ok1=1;
     $ok2=0;
     $ok3=0;
     $ok4=0;
     $ok5=0;
     $suivant=0;
     
     if (!isset($_GET['page'])) {
      $page=1;
      $_SESSION['produits'] = $produits;
      $nombrePage=nombrePageTotal($_SESSION['produits'],6);
      $produit1=get_element_to_display(  $_SESSION['produits'],$page,6);  
      }
      if (isset($_GET['page'])) {
        $page=$_GET['page'];
        $ok1=$ok1;
        $ok2=$ok1+1;
        $ok3=$ok2+1;
        $ok4=$ok3+1;
        $ok5=$ok4+1;
        $suivant=$page+1;
        $precedent=$page-1;
        $nombrePage=nombrePageTotal(  $_SESSION['produits'],6);
        $produit1=get_element_to_display(  $_SESSION['produits'],$page,6);

      }
     ?>

<table class="table table-bordered" >

<thead class="ok1" style="border:2px solid black;">

    <tr class="ok2" style="border:2px solid black;">

    <th scope="col" class="gueye" style="border:2px solid black;">Description</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">Prix unitaire</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">Quantite stock</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">Id_categorie</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">Action</th>

    </tr>

</thead>
<tbody class="sene " style="border:2px solid black;">
    
  
<?php foreach ($produit1 as $key => $value):?>
    <tr class="ok" style="border:2px solid black;">
    

    <th class="gueye" style="border:2px solid black;" scope="row"><?php echo $value['description'];?></th>
    <td class="gueye" style="border:2px solid black;"><?php echo $value['prix_unitaire'];?></td>
    <td class="gueye" style="border:2px solid black;"><?php echo $value['quantite_stock'];?></td>
    <td class="gueye" style="border:2px solid black;"><?php echo $value['id_categorie'];?></td>
    <td class="gueye" style="color:#f17503;">
        <a name="" id="" class="btn btn" href="<?= WEB_ROUTE.'?controllers=produit&views=modification&id='.$value['id_produit'] ?>" role="button">
            <img src="img/101.png" class="image" style="width:30px;height:30px;" alt=""> 
        </a>
    </td>
  
    </tr>
    <?php endforeach ;?>

</tbody>
</table>



                
                </div>
            </div>
        </div>
  </div>
  <div class="row text-center">
        <div class="col-sm-4 offset-sm-4" style="margin-top:-3%; margin-right:100px;">
          <ul class="pagination pl-4">
          <?php if($page<=1):?>
              <li class="page-item disabled ">
                <a class="page-link desable" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$precedent?>">&laquo;</a>
              </li>
              <?php else:?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$precedent?>">&laquo;</a>
              </li>
                <?php endif ?>
              <?php if( $page==1):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok1?>">1</a>
              </li>
              <?php elseif($page!=1):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok1?>">1</a>
              </li>
              <?php endif ?>
              <?php if($page==2):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok2?>">2</a>
              </li>
              <?php elseif($page!=2):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok2?>">2</a>
              </li>
              <?php endif ?>
              <?php if($page==3):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok3?>">3</a>
              </li>
              <?php elseif($page!=3):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok3?>">3</a>
              </li>
              <?php endif ?>
              <?php if($page==4):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok4?>">4</a>
              </li>
              <?php elseif($page!=4):?>
                <li class="p age-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok4?>">4</a>
              </li>
              <?php endif ?>
              <?php if($page==5):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok5?>">5</a>
              </li>
              <?php elseif($page!=5):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$ok5?>">5</a>
              </li>
              <?php endif ?>
              <?php if($nombrePage<=$page):?>
              <li class="page-item disable">
                <a class="page-link " href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$suivant?>">&raquo;</a>
              </li>
              <?php elseif($nombrePage>$page ):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=produit&views=lister.produit&page='.$suivant?>">&raquo;</a>
              </li>
              <?php endif ?>
            </ul>
        </div>
 </div> 
  </div>

<?php 
require(ROUTE_DIR.'public/inc/footer.html.php');
?>
