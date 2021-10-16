<?php 
  function find_all_categorie():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from categorie";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
    $tab = $sth->fetchALL(); 
    fermer_connexion_bd($PDO);
  return $tab;
  }  


    function insert_sous_categorie(array $data):int{
        $PDO=ouvrir_connexion_bd(); 
        //extract($user);
          $sql="INSERT INTO sous_categorie (id_categorie, nom_sous_categorie ) VALUES (?,?)";
          $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute($data);
         $nbre_ligne_insert = $sth->rowCount();
         fermer_connexion_bd($PDO);
         return $nbre_ligne_insert;
     
  }
  function find_al_sous_categorie():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from sous_categorie";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
    $tab = $sth->fetchALL(); 
    fermer_connexion_bd($PDO);
  return $tab;
  }


  function update_sous_categorie($id,$id_categorie,$nom_sous_categorie):array{
    $PDO=ouvrir_connexion_bd();
      $sql="UPDATE `sous_categorie` SET `nom_sous_categorie` = ?, `id_categorie` = ?
      WHERE `sous_categorie`.`id_sous_categorie` = ?";
      $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute(array($nom_sous_categorie,$id_categorie,$id));
     $tab = $sth->fetchALL();
     fermer_connexion_bd($PDO);
     return $tab;
      
  }
?>