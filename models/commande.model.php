<?php 
  

  function filtre_commande(string $etat_commande,string $date_commande,int $id_user):array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from users u,commande c,role r where c.id_user=u.id_user
    and u.id_role=r.id_role and r.nom_role='role_client'
     and c.etat_commande=?
     and c.date_commande=? and u.id_user=?";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute(array($etat_commande,$date_commande,$id_user));
    $user=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $user; 
  }
  
  function find_all_commande():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from commande";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute();
    $array=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $array; 
  }
  function find_all_user():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from users u, role r where u.id_role=r.id_role and r.nom_role like 'role_client'";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute();
    $array=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $array; 
  }

  function find_produit_commander_by_client( $id_client):array{
    $PDO= ouvrir_connexion_bd();
    $sql="select * from commande c,produit p,users u
      where c.id_produit=p.id_produit
      and u.id_user=c.id_user
      and c.id_user= ?";
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_client]);
    $commande = $sth->fetchAll();
    fermer_connexion_bd($PDO);
    return $commande;
  }

  function insert_commande(array $data):int{
    $PDO= ouvrir_connexion_bd();
    $sql="INSERT INTO `commande` (`id_commande`, `etat_commande`, `id_user`, 
    `id_produit`, `montant_commande`, `date_commande`) 
    VALUES (NULL, ?, ?, ?, ?,?)" ;
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($data);
    $nbre_ligne_insert = $sth->rowCount();
    fermer_connexion_bd($PDO);
    return $nbre_ligne_insert;
  }

  function find_montant_commande_by_id($id):array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from produit p
    where p.id_produit=?";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute([$id]);
    $array=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $array; 
  }

  function find_produit_by_id(int $id):array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from produit p
    where p.id_produit=?";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute([$id]);
    $array=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $array; 
  }

function find_allll_produit():array{
  $PDO=ouvrir_connexion_bd();
  $sql="select * from produit";
   $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
 $sth->execute();
  $tab = $sth->fetchALL(); 
  fermer_connexion_bd($PDO);
 return $tab;
} 

  ?>