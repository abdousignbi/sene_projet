<?php 

 require(ROUTE_DIR.'public/inc/header.html.php');
?>

<nav class="navbar navbar-expand-lg navbar bg" 
      style="border:2px solid black; margin-left:0%;margin-right:0%;">  

      <a class="navbar-brand" href="<?= WEB_ROUTE. '?controllers=user&views=catalogue' ?>">
      <img src="img/45.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom
        ,rounded-left,rounded-circle,|}" style="margin-left:10%;" alt="">
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor01"
        aria-controls="navbarColor01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav">
          <li class="nav-item active ">
            <a class="nav-link"style="color:black;margin-left:10%;"
             href="<?= WEB_ROUTE. '?controllers=user&views=catalogue' ?>">Accueil</a> 
          </li>


          <li class="nav-item">
        </ul>
        <form class="form-inline my-3 my-lg-0" style="margin-left:10%;" >
          <input
            class="form-control mr-sm-2 "
            type="text"
            placeholder="Rechercher un produit..."
          />
          <button class="btn btn-secondary my-2 my-sm-0" style="background:#f17503;" type="submit">
            Rechercher
          </button>
           </form>  
        <ul class="navbar-nav mr-o " > 
            <li class="nav-item dropdown" > 
            <a class="nav-link dropdown-toggle mr-5" style="color:black;margin-left:30%;" href="#" data-toggle="dropdown" role="button"aria-haspopup="true"aria-expanded="false">Se connecter</a>
              <div class="dropdown-menu ">
                <a class="dropdown-item active " style="background:#f17503;" href="<?= WEB_ROUTE. '?controllers=security&views=connexion' ?>">Votre compte</a>
                <?php if(est_client()):?>
                <a class="dropdown-item "href="<?=WEB_ROUTE.'?controllers=commande&views=etat.commande'?>">Vos commandes</a> 
               
                <a class="dropdown-item "href="<?=WEB_ROUTE.'?controllers=livraison&views=etat.livraison'?>">Vos livraisons</a>

                <a class="dropdown-item "href="<?=WEB_ROUTE.'?controllers=commande&views=favoris&id_produit=1'?>">Vos favoris</a>
                <?php endif ?>
              </div>
            </li>
              </ul>
              <img src="img/49.png" class="img-fluid ${3|rounded-top,rounded-right
                ,rounded-bottom,rounded-left,rounded-circle,|}"  alt="">
                <form   action="<?= WEB_ROUTE ?>" method="POST" > 
                    <input type="hidden" name="controllers" value="security"/>
                    <input type="hidden" name="action" value="deconnexion"/>
                        <button type="submit" name="submit" class="btn" 
                        style="margin-left:80px;
                        background:#f17503; color:white;">deconnexion</button>
                  </form>
                <img src="img/001.jpeg" class="img-fluid ${3|rounded-top,rounded-right
                ,rounded-bottom,rounded-left,rounded-circle,|}" style="width:4%;height:4%; margin-left:5%;" alt="">   

    </nav>

        
          <div class="jumbotron text-center p-3 bg-white" style="margin-left:13%; margin-right:0%">
            <h1 class="display-3"> Nos produits disponible</h1>  
          </div>
      <div class="container-fluid  " style="margin-top:-2.5%;">



      <div class="wrapper" style="">
          <ul>
            <li>
             <a href="<?=WEB_ROUTE.'?controllers=user&views=informatique'?>" class="ok" style="color:#f17503;">Categorie informatique</a>
              <ul>
              <li><a href="<?=WEB_ROUTE.'?controllers=user&views=bureau'?>">ordinateurs de bureau</a></li>
              <li><a href="<?=WEB_ROUTE.'?controllers=user&views=portable'?>">ordinateurs portable</a></li>
              <li> <a href="<?=WEB_ROUTE.'?controllers=user&views=photocopieuse'?>">photocopieuse</a></li>
              <li> <a href="<?=WEB_ROUTE.'?controllers=user&views=imprimante'?>">imprimante</a></li>
              <li> <a href="<?=WEB_ROUTE.'?controllers=user&views=scanner'?>">scanner</a></li>
              </ul>
            </li>
            <li>
              <a href="" class="ok" style="color:#f17503;">Categorie bureautique</a>
              <ul>
              <li><a href="">tables de bureau</a></li>
              <li><a href="">tables de reunion</a></li>
              <li> <a href="">chaizes</a></li>
              <li> <a href="">armoire</a></li>
              </ul>
            </li>
            <li>
              <a href="" class="ok" style="color:#f17503;">Categorie electro-menagere</a>
              <ul>
              <li><a href="">machines a laver</a></li>
              <li><a href="">refrigerateurs</a></li>
              <li> <a href="">climatiseurs</a></li>
              </ul>
            </li>
          </ul>
       </div>

          
        <div class="container-fluid  " style="margin-top:-28%; width:70%;">
          <div class="row ">
            <!-- partie chargement des images dans la page -->

            <?php 
     $nombrePage=0;
     $precedent=1;
     $page=0;
     $ok1=1;
     $ok2=0;
     $ok3=0;
     $ok4=0;
     $ok5=0;
     $suivant=0;
     
     if (!isset($_GET['page'])) {
      $page=1;
      $_SESSION['images'] = $images;
      $nombrePage=nombrePageTotal(  $_SESSION['images'],3);
      $image=get_element_to_display(  $_SESSION['images'],$page,3);  
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
        $nombrePage=nombrePageTotal(  $_SESSION['images'],3);
        $image=get_element_to_display(  $_SESSION['images'],$page,3);

      }
     ?>

        <?php 
        
        foreach 
        ($image as $key => $value):?>
     <div class="col-md-4">
       <div class="card" style="height:25%;">
             <img  
             src="img/<?php echo $value['nom_image'] ?> " class="card-img-top 
             ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
          <div class="card-body">
              <h5 class="card-title"><span class="badge badge-succes">
              <span class="badge badge-primary" style="color:#f17503;"><?=$value['prix_unitaire'] ?></span>
              <span class="badge badge-primary" style="color:#f17503;"><?=$value['description'] ?></span>
              <span class="badge badge-primary" style="color:#f17503;"><?=$value['quantite_stock'] ?> </br> 
                 </span>
            </h5>
              </hr>
              <a href="<?= WEB_ROUTE.'?controllers=commande&views=add.commande&id_produit='.$value['id_produit']?>" class="btn btn-sm btn-outline-primary float-right ml-3" style="color:#f17503;" >Commander</a>
              <a href="<?=WEB_ROUTE.'?controllers=client&views=detail&id_image='.$value['id_image']?>" class="btn btn-sm btn-outline-success float-right">Détails</a>
              <a href="<?=WEB_ROUTE.'?controllers=commande&views=favoris&id_produit='.$value['id_produit']?>" class="btn btn-sm btn-outline-success float-right">favoris</a>
              </hr>
         </div>   
        </div>
     </div>
  <?php
   endforeach ?> 
   </div>
     <!-- partie paggination -->
  <div class="row text-center">
        <div class="col-sm-4 offset-sm-4">
          <ul class="pagination pl-4">
          <?php if($page<=1):?>
              <li class="page-item disabled ">
                <a class="page-link desable" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$precedent?>">&laquo;</a>
              </li>
              <?php else:?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$precedent?>">&laquo;</a>
              </li>
                <?php endif ?>
              <?php if($page==1):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok1?>">1</a>
              </li>
              <?php elseif($page!=1):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok1?>">1</a>
              </li>
              <?php endif ?>
              <?php if($page==2):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok2?>">2</a>
              </li>
              <?php elseif($page!=2):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok2?>">2</a>
              </li>
              <?php endif ?>
              <?php if($page==3):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok3?>">3</a>
              </li>
              <?php elseif($page!=3):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok3?>">3</a>
              </li>
              <?php endif ?>
              <?php if($page==4):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok4?>">4</a>
              </li>
              <?php elseif($page!=4):?>
                <li class="p age-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok4?>">4</a>
              </li>
              <?php endif ?>
              <?php if($page==5):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok5?>">5</a>
              </li>
              <?php elseif($page!=5):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$ok5?>">5</a>
              </li>
              <?php endif ?>
              <?php if($nombrePage<=$page):?>
              <li class="page-item disable">
                <a class="page-link " href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$suivant?>">&raquo;</a>
              </li>
              <?php elseif($nombrePage>$page ):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=client&views=catalogue&page='.$suivant?>">&raquo;</a>
              </li>
              <?php endif ?>
            </ul>
        </div>
 </div>  
 </div>
     
<?php 
  require(ROUTE_DIR.'public/inc/footer.html.php');
?>
<style>
.wrapper ul{
  margin:0px;
  padding:0px;
}
.wrapper li{
  list-style:none;
}
.wrapper ul li a{
  color:black;
  text-decoration:none;
  width:100px;
  height:100px;
}
</style>
<?php
    unset($_SESSION['prix_unitaire']);
?>