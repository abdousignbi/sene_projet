<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
     if (isset($_GET['views'])){  
         if ($_GET['views']=='add.produit') {
           show_form_produit();
           //$categories=find_alll_categorie();
           //$sous_categories=find_all_sous_categorie();
        }elseif($_GET['views']=='lister.produit'){
             lister_produit();
        }elseif($_GET['views']=='en.rupture'){
            show_produit_en_rupture();
       }elseif($_GET['views']=='modification'){
        $id=$_GET['id'];
        $produit=recup_produit_by_id($id);
        $categories=find_alll_categorie();
        $sous_categories=find_all_sous_categorie();
        require ( ROUTE_DIR . 'views/gestionnaire/add.produit.html.php');
    }
     }else{
      catalogue();
     } 
 }elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
       if($_POST['action']=='add.produit'){
        if ($_POST['action']=="add.produit") {
            if(isset($_POST['appliquer'])){
               show_form_produit($_POST['nombre_image']);
           }else{
               add_produit($_POST);
            }
       }elseif($_POST['action']=='modification'){
        modif_produit($_POST);
       }
               
       }
    }
}

function ajouter_produit(array $data):void{
    $arrayError=array();
    extract($data);
    valid_nom($description,'description',$arrayError); 
    valid_prix_unitaire($prix_unitaire,'prix_unitaire',$arrayError);
    if(form_valid($arrayError)){
        add_produit($data);
        header('location:'.WEB_ROUTE.'?controllers=produit&views=lister.produit');
        exit(); 

    }else{
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controllers=produit&views=add.produit');
        exit();
    }
}

 function add_produit(array $post):void{
     extract($post);
     $produit=[
      $description,
      $id_categorie,
      $id_sous_categorie,
      $prix_unitaire,
      $quantite_stock
     ];
     $id_produit=insert_produit($produit);
     foreach ($avatar as $key => $value) {
         $image=[
             $value,
             $id_produit
         ];
         insert_image($image);
     }
     show_form_produit();
} 

 function show_form_produit($nombre_image=1){
   $categories=find_alll_categorie();
    $sous_categories=find_all_sous_categorie();
    $_SESSION['nombre_image']=$nombre_image;
    require(ROUTE_DIR.'views/gestionnaire/add.produit.html.php');
  }

  function lister_produit(){
      $produits=find_alll_produit(); 
      require ( ROUTE_DIR . 'views/gestionnaire/update/lister.produit.html.php');
  }

function show_produit_en_rupture(){
   $ruptures=find_produit_en_rupture();
   require ( ROUTE_DIR . 'views/gestionnaire/statistique/en.rupture.html.php');
}

function modif_produit(array $produitNew){
    extract($produitNew);
       update_produit($id_produit,$description,$id_categorie,$id_sous_categorie,$prix_unitaire,$quantite_stock);
       header('location:'.WEB_ROUTE.'?controllers=produit&views=lister.produit'); 
    
  } 

   function recup_produit_by_id(string $id):array{
    $produits=find_alll_produit();
    foreach ($produits as $produit) {
           if ($produit['id_produit']==$id) {
               return $produit;
           }
    }
    return [];
   }

 ?>