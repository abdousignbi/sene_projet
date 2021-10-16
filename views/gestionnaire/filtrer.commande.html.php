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
  <h3 class="abdou" style="margin-left:30%;color:#f17503;margin-top:-10%;">Liste des categories</h3>
       
        <div class="container">
        <form   action="<?= WEB_ROUTE ?>" method="POST" > 
                    <input type="hidden" name="controllers" value="commande">
                    <input type="hidden" name="action" value="filtrer.commande">
            <div class="row">

                <div class="col-md-2">
                <div class="form-group">
                  <label for="Etat">Etat</label>
                  <select class="form-control" name="etat_commande" id="">
                    <option value="en_cours">En_cours</option>
                    <option value="valider">Valider</option>
                    <option value="annuler">Annuler</option>
                  </select>
                </div>
            </div>
                
            <div class="col-md-3" style="margin-left:15%;">
                <div class="form-group">
                  <label for="date">date</label>
                  <input type="date"
                    class="form-control" name="date_commande" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted"></small>
                </div>
            </div>

                 
            <div class="col-md-2" style="margin-left:15%;">
                <div class="form-group" >
                  <label for="">Client</label>
                  <select class="form-control" name="id_user" id="id_user">
                    <?php foreach ($users as $key => $value):?> 
                    <option value="<?php echo $value['id_user'] ?>"><?php echo $value['nom_user']?></option>
                    <?php endforeach ?>

                  </select>
                </div>
            </div>

            <div class="col-md-1" style="margin-top:3.5%;margin-left:0%;">
                <button type="submit" class="btn btn-primary" name="ok">ok</button>
            </div>

         </div>
         </form> 

          <div class="row">  
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
      $_SESSION['commandes'] = $commandes;
      $nombrePage=nombrePageTotal($_SESSION['commandes'],6);
      $commande=get_element_to_display(  $_SESSION['commandes'],$page,6);  
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
        $nombrePage=nombrePageTotal(  $_SESSION['commandes'],6);
        $commande=get_element_to_display(  $_SESSION['commandes'],$page,6);

      }
     ?>

<table class="table table-bordered" >

<thead class="ok1" style="border:2px solid black;">

    <tr class="ok2" style="border:2px solid black;">

    <th scope="col" class="gueye" style="border:2px solid black;">etat_commande</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">date_commande</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">id_user</th>

    </tr>

</thead>
<tbody class="sene " style="border:2px solid black;">
    
  
<?php foreach ($commande as $key => $value):?>
    <tr class="ok" style="border:2px solid black;">
    

    <td class="gueye" style="border:2px solid black;"><?php echo $value['etat_commande'];?></td>
    <td class="gueye" style="border:2px solid black;"><?php echo $value['date_commande'];?></td>
    <td class="gueye" style="border:2px solid black;"><?php echo $value['id_user'];?></td>
 
  
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
                <a class="page-link desable" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$precedent?>">&laquo;</a>
              </li>
              <?php else:?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$precedent?>">&laquo;</a>
              </li>
                <?php endif ?>
              <?php if( $page==1):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok1?>">1</a>
              </li>
              <?php elseif($page!=1):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok1?>">1</a>
              </li>
              <?php endif ?>
              <?php if($page==2):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok2?>">2</a>
              </li>
              <?php elseif($page!=2):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok2?>">2</a>
              </li>
              <?php endif ?>
              <?php if($page==3):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok3?>">3</a>
              </li>
              <?php elseif($page!=3):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok3?>">3</a>
              </li>
              <?php endif ?>
              <?php if($page==4):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok4?>">4</a>
              </li>
              <?php elseif($page!=4):?>
                <li class="p age-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok4?>">4</a>
              </li>
              <?php endif ?>
              <?php if($page==5):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok5?>">5</a>
              </li>
              <?php elseif($page!=5):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$ok5?>">5</a>
              </li>
              <?php endif ?>
              <?php if($nombrePage<=$page):?>
              <li class="page-item disable">
                <a class="page-link " href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$suivant?>">&raquo;</a>
              </li>
              <?php elseif($nombrePage>$page ):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie&page='.$suivant?>">&raquo;</a>
              </li>
              <?php endif ?>
            </ul>
         
 </div> 
</div>

<?php 
require(ROUTE_DIR.'public/inc/footer.html.php');
?>
