<?php 
  function find_alll_categorie():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from categorie";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
    $tab = $sth->fetchALL(); 
    fermer_connexion_bd($PDO);
  return $tab;
  }  

  function find_all_sous_categorie():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from sous_categorie";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
    $tab = $sth->fetchALL(); 
    fermer_connexion_bd($PDO);
  return $tab;
  } 

  function insert_produit(array $produit):int{
    $PDO=ouvrir_connexion_bd();
    $sql="INSERT INTO `produit` (`description`, `id_categorie`, `id_sous_categorie`, `prix_unitaire`,
     `quantite_stock`)
    VALUES (?, ?, ?, ?, ?)";
     $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($produit);
      $dernier_id = $PDO->lastInsertId();
    fermer_connexion_bd($PDO);
     return $dernier_id ;
  }

  function insert_image(array $image):int{
    $PDO= ouvrir_connexion_bd();
    $sql="INSERT INTO `image` (`nom_image`, `id_produit`) VALUES (?,?);";
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($image);
    $dernier_id = $PDO->lastInsertId();
    fermer_connexion_bd($PDO);
    return $dernier_id ;
  }

function find_alll_produit():array{
  $PDO=ouvrir_connexion_bd();
  $sql="select * from produit";
   $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
 $sth->execute();
  $tab = $sth->fetchALL(); 
  fermer_connexion_bd($PDO);
 return $tab;
} 
    
    function find_produit_by_id_produit(string $id,int $quantite_stock):array{
      $PDO=ouvrir_connexion_bd();
      $sql="select * from produit where id_produit=?";
       $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();
      $tab = $sth->fetchALL(); 
      fermer_connexion_bd($PDO);
      return $tab;
    } 

    function update_produit($id_produit,$description,$id_categorie,$id_sous_categorie,$prix_unitaire,$quantite_stock):array{
      $PDO=ouvrir_connexion_bd();
        $sql="UPDATE `produit` SET `description` = 'p12', `id_categorie` = '2', `id_sous_categorie` = '1',
       `prix_unitaire` = '1000', `quantite_stock` = '10' WHERE `produit`.`id_produit` = 1";
        $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(array($description,$id_categorie,$id_sous_categorie,$prix_unitaire,$quantite_stock,$id_produit));
       $tab = $sth->fetchALL();
       fermer_connexion_bd($PDO);
       return $tab;
        
    }
?>