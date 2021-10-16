<?php
 if ($_SERVER['REQUEST_METHOD']=='GET') {
     if (isset($_GET['views'])){  
       if ($_GET['views']=='add.categorie') {
          require ( ROUTE_DIR . 'views/gestionnaire/add.categorie.html.php');
        }elseif($_GET['views']=='lister.categorie'){
          show_categorie();
        }elseif($_GET['views']=='modification'){
            $id=$_GET['id'];
            $categorie=recup_categorie_by_id($id);
            require ( ROUTE_DIR . 'views/gestionnaire/add.categorie.html.php');
        }
     }else{
      catalogue(); 
     } 
 }elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
       if($_POST['action']=='add.categorie'){
        unset($_POST['controllers']);
        unset($_POST['action']);
        unset($_POST['submit']); 
         ajouter_categorie($_POST);
       }elseif($_POST['action']=='modification'){
        
        modif_categorie($_POST);
       }
    }
}

function ajouter_categorie(array $data ):void{
    $arrayError=array();
    extract($data);
    valid_nom($nom_categorie,'nom_categorie',$arrayError);          
    if (form_valid($arrayError)) {
            add_categorie($data);
            header('location:'.WEB_ROUTE.'?controllers=categorie&views=lister.categorie');
            exit();  

    }else{
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controllers=categorie&views=add.categorie');
        exit();
        }
 }

function add_categorie(array $post):void{
    extract($post);
      $data=[
      $nom_categorie
   ];
   insert_categorie($data);
}

function show_categorie(){
    $categories=find_allll_categorie();
    require ( ROUTE_DIR . 'views/gestionnaire/update/lister.categorie.html.php');
}

function recup_categorie_by_id(string $id):array{
    $categories=find_allll_categorie();
    foreach ($categories as $categorie) {
           if ($categorie['id_categorie']==$id) {
               return $categorie;
           }
    }
    return [];
   }
  
     function modif_categorie(array $categorieNew){
       extract($categorieNew);
       update_categorie($id_categorie,$nom_categorie);
       header('location:'.WEB_ROUTE.'?controllers=categorie&views=lister.categorie'); 
    
      } 
 ?>