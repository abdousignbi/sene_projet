<?php

if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
    if ( isset ( $_GET [ 'views' ])) {
       if ( $_GET [ 'views' ]== 'connexion' ) {
        require ( ROUTE_DIR . 'views/security/connexion.html.php' );
       }elseif ( $_GET [ 'views' ]== 'inscription' ) {
        show_form_user();
        //require ( ROUTE_DIR . 'views/security/inscription.html.php' );
       }elseif($_GET['views']=='deconnexion') {
         deconnexion();
         header('location:'.WEB_ROUTE.'?controllers=security&views=connexion');
          
     }elseif ( $_GET [ 'views' ]== 'forgot' ) {
         require ( ROUTE_DIR . 'views/security/forgot.html.php' );
        } 
    } else{
       require ( ROUTE_DIR . 'views/security/inscription.html.php' );
       //require ( ROUTE_DIR . 'views/security/connexion.html.php' );
      //require(ROUTE_DIR.'views/produit/catalogue.html.php');
       } 
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['action'])) {
           if($_POST['action']=='connexion'){
          
             connexion($_POST['login_u'],$_POST['password_u']);
           }elseif ($_POST['action']=='inscription') {
            unset($_POST['controllers']);
            unset($_POST['action']);
            unset($_POST['submit']);
                  inscription($_POST) ;
            
           }elseif ($_POST['action']=='deconnexion') {
            deconnexion();
            header('location:'.WEB_ROUTE.'?controllers=security&views=connexion');
           }
        }
}
function connexion(string $login_u,string $password_u):void{
       $arrayError=array();
       valid_email($login_u,'login_u',$arrayError);
       valid_password($password_u,'password_u',$arrayError);
       if (form_valid($arrayError)) {
      $user=find_user_by_login_password($login_u,$password_u);
         if (count($user)==0) {
            $arrayError['erreur_connexion']="login ou password incorecte";
            $_SESSION['arrayError']=$arrayError;
            header("location:".WEB_ROUTE."?controllers=security&views=connexion");
            exit();
         }else{
         
            $_SESSION['userConnect']=$user;
            if($user['nom_role']=='role_client'){
              header("location:".WEB_ROUTE.'?controllers=user&views=catalogue');
              exit();
            }elseif ($user['nom_role']=='role_gestionnaire') {
               header("location:".WEB_ROUTE."?controllers=user&views=filtrer.commande");
               exit();
            }
         }
       }else{
          $_SESSION['arrayError']=$arrayError;
          header("location:".WEB_ROUTE."?controllers=security&views=connexion");
          exit();
         }
}
function inscription(array $user ):void{

   $arrayError=array();
   extract($user);
   valid_email($login_u,'login_u',$arrayError);
   valid_password($password_u,'password_u',$arrayError);
   valid_prenom($prenom_user,'prenom_user',$arrayError);
   valid_nom($nom_user,'nom_user',$arrayError);   
   //valid_cle_etrangere($id_role,'id_role',$arrayError);           
   if (form_valid($arrayError)) {
       //ajout_user($kaka);
        if(est_gestionnaire()){
            $user['nom_role']="role_gestionnaire";
        }elseif(est_client()){
             $user['nom_role']="role_client";
        }
        add_user($user);
        header('location:'.WEB_ROUTE.'?controllers=security&views=connexion');
        exit();
   }else{
       $_SESSION['arrayError']=$arrayError;
       header('location:'.WEB_ROUTE.'?controllers=security&views=incription');
       exit();
       }
}

function insert_user(array $user):int{
   $PDO=ouvrir_connexion_bd(); 
   //extract($user);
     $sql="INSERT INTO users (id_role, nom_user, prenom_user,login_u, password_u ) VALUES (?,?,?,?,?)";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($user);
    $nbre_ligne_insert = $sth->rowCount();
    fermer_connexion_bd($PDO);
    return $nbre_ligne_insert;

}

function add_user(array $post):void{
       extract($post);
         $user=[
         $role,
         $nom_user,
         $prenom_user,
         $login_u,
         $password_u
      ];
      insert_user($user);
   }

function find_all_role():array{
   $PDO=ouvrir_connexion_bd();
   $sql="select * from role";
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute();
   $role = $sth->fetchALL(); 
   fermer_connexion_bd($PDO);
 return $role;
 } 

function deconnexion():void{
   unset($_SESSION['userConnect']);
  }

 function show_form_user(){
   $roles=find_all_role();
   //$_SESSION['nbre']=$nbre;
   require(ROUTE_DIR.'views/security/inscription.html.php');
 } 
?>
