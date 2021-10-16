<?php
 if ($_SERVER['REQUEST_METHOD']=='GET') {
     if (isset($_GET['views'])){  
       if ($_GET['views']=='add.sous.categorie') {
            show_form_sous_categorie();
          //require ( ROUTE_DIR . 'views/gestionnaire/add.sous.categorie.html.php');
        }elseif($_GET['views']=='lister.sous.categorie'){
          show_sous_categorie();
          //require ( ROUTE_DIR . 'views/gestionnaire/update/lister.sous.categorie.html.php');
        }elseif($_GET['views']=='modification'){
          $id=$_GET['id'];
          $sous_categorie=recup_sous_categorie_by_id($id);
          $categories=find_all_categorie();
          require ( ROUTE_DIR . 'views/gestionnaire/add.sous.categorie.html.php');
      }
     }else{
      catalogue();
      
     } 
 }elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
       if($_POST['action']=='add.sous.categorie'){
        unset($_POST['controllers']);
        unset($_POST['action']);
        unset($_POST['submit']);
         ajouter_sous_categorie($_POST);
       }elseif($_POST['action']=='modification'){
        
        modif_sous_categorie($_POST);
       }
    }
}

function ajouter_sous_categorie(array $data ):void{

    $arrayError=array();
    extract($data);
    valid_nom($nom_sous_categorie,'nom_sous_categorie',$arrayError);          
    if (form_valid($arrayError)) {
         
         add_sous_categorie($data);
         header('location:'.WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie');
         exit();
    }else{
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controllers=sous.categorie&views=add.sous.categorie');
        exit();
        }
 }
 
 function show_form_sous_categorie(){
    $categories=find_all_categorie();
    //$_SESSION['nbre']=$nbre;
    require(ROUTE_DIR.'views/gestionnaire/add.sous.categorie.html.php');
  }
  
  function add_sous_categorie(array $post):void{
    extract($post);
      $data=[
      $categorie,
      $nom_sous_categorie
   ];
   insert_sous_categorie($data);
}
function show_sous_categorie(){
     $sous_categories=find_al_sous_categorie();
     require ( ROUTE_DIR . 'views/gestionnaire/update/lister.sous.categorie.html.php');
}
function recup_sous_categorie_by_id(string $id):array{
  $sous_categories=find_al_sous_categorie();
  foreach ($sous_categories as $sous_categorie) {
         if ($sous_categorie['id_sous_categorie']==$id) {
             return $sous_categorie;
         }
  }
  return [];
 }
 function modif_sous_categorie(array $sous_categorieNew){
  extract($sous_categorieNew);
  update_sous_categorie($id_sous_categorie,$categorie,$nom_sous_categorie);
 
  header('location:'.WEB_ROUTE.'?controllers=sous.categorie&views=lister.sous.categorie'); 

 }
?>