<?php
if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
    if ( isset ( $_GET [ 'views' ])) {
       if ($_GET [ 'views' ]== 'livraison.journee' ) {
         show_livraison_journee();
       }elseif($_GET [ 'views' ]== 'filtrer.livraison' ){
              get_livraison();
       }elseif($_GET [ 'views' ]== 'etat.livraison' ){
        lister_livraison_un_client($_SESSION['userConnect']['id_user']); 
        //require ( ROUTE_DIR . 'views/client/etat.livraison.html.php');
 }
    }else {
      require(ROUTE_DIR.'views/client/catalogue.html.php');
    }
}elseif($_SERVER ['REQUEST_METHOD' ]== 'POST'){
  if (isset($_POST['action'])) {
    if($_POST['action']=='filtrer.livraison'){
      if(isset($_POST['ok']))
             get_livraison();
    }
 }
}

 


function show_livraison_journee(){
  $livraisons=find_livraison_journee();
  require ( ROUTE_DIR . 'views/gestionnaire/statistique/livraison.journee.html.php');
}

function get_livraison(){
  if(isset($_POST['ok'])){
    $users=find_alll_user();
    $etat_livraison=$_POST['etat_livraison'];
    $date_livraison=date_format(date_create($_POST['date_livraison']),'Y-m-d');
    $id_user=$_POST['id_user'];
    $livraisons=filtre_livraison($etat_livraison,$date_livraison,$id_user);
    require ( ROUTE_DIR . 'views/gestionnaire/filtrer.livraison.html.php');
  }else{
    $users=find_alll_user();
    $livraisons=find_all_livraison();
    require ( ROUTE_DIR . 'views/gestionnaire/filtrer.livraison.html.php');
  }
 
} 

function lister_livraison_un_client($id_client):void{
  $livraisons= find_livraison_by_client((int)$id_client);
  require ( ROUTE_DIR . 'views/client/etat.livraison.html.php');
  
}
?>