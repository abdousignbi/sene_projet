<?php
 if ($_SERVER['REQUEST_METHOD']=='GET') {
     if (isset($_GET['views'])){
         if($_GET['views']=='catalogue'){
            //require(ROUTE_DIR.'views/client/catalogue.html.php');
           // catalogue1();
            catalogue(); 
         }elseif ($_GET['views']=='detail') {
             detail_produit();
         }elseif ($_GET['views']=='favoris') {
          require ( ROUTE_DIR . 'views/gestionnaire/favoris.html.php');
        }elseif ($_GET['views']=='add.produit') {
             catalogue(); 
       }elseif ($_GET['views']=='tableaubord') {
             show_form_tableau();
     }elseif ($_GET['views']=='liste.commande') {
        require ( ROUTE_DIR . 'views/gestionnaire/liste.commande.html.php');
      }elseif ($_GET['views']=='informatique') {
        informatique();
        //require ( ROUTE_DIR . 'views/client/informatique.html.php');
      }elseif ($_GET['views']=='bureau') {
             bureau();
      }elseif ($_GET['views']=='portable') {
        portable();
        }

     }else{
     //require(ROUTE_DIR.'views/client/catalogue.html.php');
      //catalogue1();
      catalogue();
     } 
 }
 function catalogue1(){
    // $images=array();
     $produits=find_all_produit();
     //require(ROUTE_DIR.'views/client/catalogue.html.php');
 }
 function catalogue(){
     $images=find_all_image();
     require(ROUTE_DIR.'views/client/catalogue.html.php');
 }

 function show_user(){
  $ussers=find_all_users();
  require ( ROUTE_DIR . 'views/gestionnaire/filtrer.commande.html.php');
}

function show_form_tableau(){
  $commandes=find_commande_etat_en_cours();
  $livraisons=find_livraison_journee();
  $produits=find_produit_en_rupture();
  require ( ROUTE_DIR . 'views/gestionnaire/tableaubord.html.php');
}

function detail_produit(){
  if(!isset($_GET['id_image'])){
    //  catalogue();
    //  require ( ROUTE_DIR . 'view/bien/catalogue.html.php');
    //catalogue2();
  }else{
  $id=$_GET['id_image'];
  $image=find_image_by_id($id);
  require ( ROUTE_DIR . 'views/client/detail.html.php');
  //header("location:".WEB_ROUTE);
  }
}

function informatique(){
  $images=find_all_image();
  require(ROUTE_DIR.'views/client/informatique.html.php');
}
function bureau(){
  $images=find_all_image();
  require(ROUTE_DIR.'views/client/bureau.html.php');
}
function portable(){
  $images=find_all_image();
  require(ROUTE_DIR.'views/client/portable.html.php');
}
?>
 
