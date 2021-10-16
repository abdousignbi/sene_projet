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

  <h3 class="abdou" style="margin-left:33%;color:#f17503;margin-top:-10%;">Liste des categories</h3>
       
         <div class="col-md-8" style="margin-left:15%;">

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
      $_SESSION['categories'] = $categories;
      $nombrePage=nombrePageTotal($_SESSION['categories'],6);
      $categorie=get_element_to_display( $_SESSION['categories'],$page,6);  
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
        $nombrePage=nombrePageTotal(  $_SESSION['categories'],6);
        $categorie=get_element_to_display(  $_SESSION['categories'],$page,6);

      }
     ?>

<table class="table table-bordered" >

<thead class="ok1" style="border:2px solid black;">

    <tr class="ok2" style="border:2px solid black;">

    <th scope="col" class="gueye" style="border:2px solid black;">id_categorie</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">nom_categorie</th>
    <th scope="col"  class="gueye" style="border:2px solid black;">Action</th>

    </tr>

</thead>
<tbody class="sene " style="border:2px solid black;">
    
  
<?php foreach ($categorie as $key => $value):?>
    <tr class="ok" style="border:2px solid black;">
    

    <td class="gueye" style="border:2px solid black;"><?php echo $value['id_categorie'];?></td>
    <td class="gueye" style="border:2px solid black;"><?php echo $value['nom_categorie'];?></td>

    <td class="gueye" style="color:#f17503;">
        <a name="" id="" class="btn btn" href="<?= WEB_ROUTE.'?controllers=categorie&views=modification&id='.$value['id_categorie'] ?>" role="button">
            <img src="img/101.png" class="image" style="width:30px;height:30px;"alt="">
        </a>
       Edit
    </td>
  
    </tr>
    <?php endforeach ;?>

</tbody>
</table>

     </div>
    </div>
  </div>

  <div class="row text-center" >
        <div class="col-sm-4 offset-sm-4" style="margin-top:0%; margin-left:30%;">
          <ul class="pagination pl-4">
          <?php if($page<=1):?>
              <li class="page-item disabled ">
                <a class="page-link desable" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$precedent?>">&laquo;</a>
              </li>
              <?php else:?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$precedent?>">&laquo;</a>
              </li>
                <?php endif ?>
              <?php if( $page==1):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok1?>">1</a>
              </li>
              <?php elseif($page!=1):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok1?>">1</a>
              </li>
              <?php endif ?>
              <?php if($page==2):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok2?>">2</a>
              </li>
              <?php elseif($page!=2):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok2?>">2</a>
              </li>
              <?php endif ?>
              <?php if($page==3):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok3?>">3</a>
              </li>
              <?php elseif($page!=3):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok3?>">3</a>
              </li>
              <?php endif ?>
              <?php if($page==4):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok4?>">4</a>
              </li>
              <?php elseif($page!=4):?>
                <li class="p age-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok4?>">4</a>
              </li>
              <?php endif ?>
              <?php if($page==5):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok5?>">5</a>
              </li>
              <?php elseif($page!=5):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$ok5?>">5</a>
              </li>
              <?php endif ?>
              <?php if($nombrePage<=$page):?>
              <li class="page-item disable">
                <a class="page-link " href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$suivant?>">&raquo;</a>
              </li>
              <?php elseif($nombrePage>$page ):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=categorie&views=lister.categorie&page='.$suivant?>">&raquo;</a>
              </li>
              <?php endif ?>
            </ul>
        </div>
 </div> 
  </div>

  <style>
#menu-accordeon {
  padding:0;
  margin:0;
  list-style:none;
  text-align: center;
  width: 180px;
}
#menu-accordeon ul {
  padding:0;
  margin:0;
  list-style:none;
  text-align: center;
}
#menu-accordeon li {
   background-color:#729EBF; 
   background-image:-webkit-linear-gradient(top, #729EBF 0%, #333A40 100%);
   background-image: linear-gradient(to bottom, #729EBF 0%, #333A40 100%);
   border-radius: 6px;
   margin-bottom:2px;
   box-shadow: 3px 3px 3px #999;
   border:solid 1px #333A40
}
#menu-accordeon li li {
   max-height:0;
   overflow: hidden;
   transition: all .5s;
   border-radius:0;
   background: #444;
   box-shadow: none;
   border:none;
   margin:0
}
#menu-accordeon a {
  display:block;
  text-decoration: none;
  color: #fff;
  padding: 8px 0;
  font-family: verdana;
  font-size:1.2em
}
#menu-accordeon ul li a, #menu-accordeon li:hover li a {
  font-size:1em
}
#menu-accordeon li:hover {
   background: #729EBF
}
#menu-accordeon li li:hover {
   background: #999;
}
#menu-accordeon ul li:last-child {
   border-radius: 0 0 6px 6px;
   border:none;
}
#menu-accordeon li:hover li {
  max-height: 15em;
}
  </style>
<?php 
require(ROUTE_DIR.'public/inc/footer.html.php');
?>
