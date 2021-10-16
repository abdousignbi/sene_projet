<?php
if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
    if ( isset ( $_GET [ 'views' ])) {
       if ($_GET [ 'views' ]== 'etat.commande' ){
        lister_commande_un_client($_SESSION['userConnect']['id_user']); 
       }elseif ( $_GET [ 'views' ]== 'commande.cours' ) { 
              show_commande_en_cours();
       } elseif($_GET['views']=='add.commande'){
        commander_produit($_SESSION['userConnect']['id_user']);
      }elseif ( $_GET [ 'views' ]== 'filtrer.commande'){
           get_commande();
       }elseif ( $_GET [ 'views' ]== 'favoris'){
        favoris_produit($_SESSION['userConnect']['id_user']);
        //require ( ROUTE_DIR . 'views/client/favoris.html.php');
    }
    }else {
      require(ROUTE_DIR.'views/client/catalogue.html.php');
    }
}elseif($_SERVER ['REQUEST_METHOD' ]== 'POST' ){
  if (isset($_POST['action'])) {
     if($_POST['action']=='filtrer.commande'){
       if(isset($_POST['ok']))
              get_commande();
     }
  }
}

 


function show_commande_en_cours(){
  $commandes=find_commande_etat_en_cours();
  require ( ROUTE_DIR . 'views/gestionnaire/statistique/commande.cours.html.php'); 
}

 function get_commande(){
  if(isset($_POST['ok'])){
    $users=find_all_user();
    $etat_commande=$_POST['etat_commande'];
    $date_commande=date_format(date_create($_POST['date_commande']),'Y-m-d');
    $id_user=$_POST['id_user'];
    $commandes=filtre_commande($etat_commande,$date_commande,$id_user);
    require ( ROUTE_DIR . 'views/gestionnaire/filtrer.commande.html.php');
  }else{
    $users=find_all_user();
    $commandes=find_all_commande();
    require ( ROUTE_DIR . 'views/gestionnaire/filtrer.commande.html.php');
  }
 
}  

function lister_commande_un_client($id_client):void{
  $signbi=find_montant_commande_by_id($_GET['id_produit']);
  $comandes= find_produit_commander_by_client((int)$id_client);
  require ( ROUTE_DIR . 'views/client/etat.commande.html.php');
  
}
   
function commander_produit( $id_client):void{
	if (!isset($_GET['id_produit'])|| !is_numeric($_GET['id_produit'])){
		require(ROUTE_DIR.'views/client/catalogue.html.php');	 
	 }
   $signbi=find_montant_commande_by_id($_GET['id_produit']);
  foreach ($signbi as $key => $value) {
    $montant_commande=$value['prix_unitaire'];
     }
	$id_produit=$_GET['id_produit' ];
	$etat_commande="en_cours";
	$date_commande=date_format(date_create(),"Y-m-d");
	insert_commande([
		$etat_commande,
		$id_client,
		$id_produit,
    $montant_commande,
		$date_commande
    
	]);
	lister_commande_un_client($id_client); 
 }
 function favoris_produit(int $id_client):void{
	if (!isset($_GET['id_produit'])|| !is_numeric($_GET['id_produit'])){
		require(ROUTE_DIR.'views/client/catalogue.html.php');	 
	 }
  $arrayFavoris[]=find_produit_by_id($_GET['id_produit']);
  require ( ROUTE_DIR . 'views/client/favoris.html.php');
 }
?>
