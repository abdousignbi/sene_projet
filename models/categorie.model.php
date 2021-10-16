<?php
function find_allll_categorie():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from categorie";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
    $tab = $sth->fetchALL(); 
    fermer_connexion_bd($PDO);
  return $tab;
  } 


  function insert_categorie(array $data):int{
    $PDO=ouvrir_connexion_bd(); 
    //extract($user);
      $sql="INSERT INTO categorie ( nom_categorie ) VALUES (?)";
      $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute($data);
     $nbre_ligne_insert = $sth->rowCount();
     fermer_connexion_bd($PDO);
     return $nbre_ligne_insert;
 
}


function update_categorie($id,$nom_categorie):array{
  $PDO=ouvrir_connexion_bd();
  
    $sql=" UPDATE `categorie` SET `nom_categorie` =? WHERE `id_categorie` = ?";
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($nom_categorie,$id));
   $tab = $sth->fetchALL();
   fermer_connexion_bd($PDO);
   return $tab;
    
}

function find_categorie_by_id(int $id):array{
  $PDO=ouvrir_connexion_bd();
  $sql="select * from categorie c
  where c.id_categorie=?";
  $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
  $sth->execute([$id]);
  $array=$sth->fetchALL();
  fermer_connexion_bd($PDO);
  return  $array; 
}
   
 ?>