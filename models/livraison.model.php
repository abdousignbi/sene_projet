<?php 

  function find_all_livraison():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from users u,role r,livraison 
    l where l.id_user=u.id_user 
    and u.id_role=r.id_role 
    and r.nom_role='role_client'
    ";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute();
    $data=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $data; 
  }

  function filtre_livraison(string $etat_livraison,string $date_livraison,int $id_user):array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from users u,livraison 
    l where l.id_user=u.id_user
    and l.etat_livraison=?
    and l.date_livraison=?
     and u.id_user=?";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute(array($etat_livraison,$date_livraison,$id_user));
    $user=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $user; 
  }

  function find_alll_user():array{
    $PDO=ouvrir_connexion_bd();
    $sql="select * from users u, role r 
    where u.id_role=r.id_role
    and r.nom_role like 'role_client'";
    $sth=$PDO->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_FWDONLY));
    $sth->execute();
    $array=$sth->fetchALL();
    fermer_connexion_bd($PDO);
    return  $array; 
  }
  function find_livraison_by_client( $id_client):array{
    $PDO= ouvrir_connexion_bd();
    $sql="select * from livraison l,users u
      where u.id_user=l.id_user
      and l.id_user= ?";
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_client]);
    $commande = $sth->fetchAll();
    fermer_connexion_bd($PDO);
    return $commande;
  }
 
  ?>