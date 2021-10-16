<?php 
 // require(ROUTE_DIR.'public/inc/header.html.php');
?>

<nav class="navbar navbar-expand-lg navbar bg" 
      style="border:2px solid black; margin-left:0%;margin-right:0%;">  
     <div class="wrapper">
     <ul>
       <li  style=""><a href="#"><img  src="img/50.svg" alt=""></a>
       <div class="wrapper2">
          <ul>
            <li>
              <a href="">Categorie informatique</a>
            </li>
            <li>
              <a href="">Categorie bureautique</a>
            </li>
            <li>
              <a href="">Categorie electro-menagere</a>
            </li>
          </ul>
       </div>
      </li>
     </ul>
     </div>
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
     
<?php 
 //require(ROUTE_DIR.'public/inc/footer.html.php');
?>
<style>
   ul li a{
    text-decoration:none; 
  }
  .wrapper2{
    display: none;
  }
  .wrapper ul li:hover .wrapper2{
    display:block;
    position:absolute;
     
  }
  ul li{
    text-decoration:none;
  }
</style>