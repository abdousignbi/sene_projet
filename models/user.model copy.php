<?php
function find_all_image():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from image";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
    $images = $sth->fetchALL(); 
    fermer_connexion_bd($PDO);
  return $images;
}


function find_all_produit():array{
  $PDO=ouvrir_connexion_bd();
  $sql="select * from produit";
   $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
 $sth->execute();
  $produits = $sth->fetchALL(); 
  fermer_connexion_bd($PDO);
return $produits;
}


function find_image_by_id(int $id):array{
  $PDO=ouvrir_connexion_bd();
  $sql="select * from image where id_image=?";
   $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
 $sth->execute(array($id));
  $image= $sth->fetchALL(); 
  fermer_connexion_bd($PDO);
return $image;
}

function find_user_by_login_password(string $login_u,string $password_u):array{
  $PDO=ouvrir_connexion_bd();
  $sql="";
  $sql="select * from users u, role r where r.id_role=u.id_role and u.login=? and u.password=?";
  $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
  $sth->execute(array($login_u, $password_u));
  $user=$sth->fetch(PDO::FETCH_ASSOC);
  fermer_connexion_bd($PDO);
  return  $user; 
}
function find_all_users():array{
  $PDO=ouvrir_connexion_bd();
  $sql="";
  $sql="select * from users";
  $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
  $sth->execute();
  $user=$sth->fetch(PDO::FETCH_ASSOC);
  fermer_connexion_bd($PDO);
  return  $user; 
}

function nombrePageTotal($array, $nombreElement): int {
  $nombrePage = 0;
  $longueurArray = count($array);
  if ($longueurArray % $nombreElement == 0) {
      $nombrePage = $longueurArray / $nombreElement;
  } else {
      $nombrePage = ($longueurArray / $nombreElement) + 1;
  }
  return $nombrePage;
}

function get_element_to_display($array, int $page, int $nombreElement): array {
  $arrayElement = [];
  $indiceDepart = ($page*$nombreElement) - $nombreElement;
  $limitElement = $page * $nombreElement;
  for ($i = $indiceDepart; $i < $limitElement; $i++) {
      if ($i >= count($array)) {
          return $arrayElement;
      } else {
          $arrayElement[] = $array[$i];
      }
  }
  return $arrayElement;
}

?>



