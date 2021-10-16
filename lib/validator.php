 <?php
 //validation des champs d'un user 
 function champ_obligatoire($value):bool{
 return empty($value);
}
//generer id
function genere_id():int{
    define("MAX",20);
    define("MIN",1);
    $chiffre="0123456789";
    $id=rand(MIN,MAX);
    return $id;
} 
//validation champs date
function valid_format_date($value, $format): bool
{
    $d = date_create_from_format($format, $value);
    return $d && $d->format($format) === $value;
}
function valid_date_creation($value, string $key, array &$arrayError): void
{
    if (champ_obligatoire($value)) {
        $arrayError[$key] = "Champ obligatoire";
    } elseif (!valide_format_date($value, 'd-m-Y') && !valide_format_date($value, 'Y-m-d')) {
        $arrayError[$key] = "Saisir une date valide";
    }
}
//validation login
function is_email($value):bool{
    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
        return true;
      }else {
        return false;
      }
}
function valid_email($value,string $key,array &$arrayError):void{
    if(champ_obligatoire($value)){
       $arrayError[$key]="le login est obligatoire";
    }elseif (!is_email($value)) {
        $arrayError[$key]="le login est incorrecte";
    }
}
//validation password
function valid_password( $value,string $key,array &$arrayError,$min=6,$max=255):void{
    if (champ_obligatoire($value)) {
        $arrayError[$key]="le password est obligatoire";
    }elseif (strlen($value)<$min ||strlen($value)>$max) {
        $arrayError[$key]="saisir un password correcte";
    }
}
//validation du nom
function valid_nom($value,string $key,array &$arrayError):void{
    if (champ_obligatoire($value)) {
        $arrayError[$key]="le nom est obligatoire";
    }
}
//validation du prenom
function valid_prenom(string $value,string $key,array &$arrayError):void{
    if (champ_obligatoire($value)) {
        $arrayError[$key]="le prenom est obligatoire";
    }
}
//validation des champs d'un produit
//validation de la description
function valid_description(string $vlue,string $key,&$arrayError):void{
    if(champ_obligatoire($value)){
      $arrayError[$key]="la description est obligatoire";
    }
}
//validation prix unitaire
function valid_prix_unitaire( $value,string $key,&$arrayError):void{
     if (champ_obligatoire($value)) {
         $arrayError[$key]="le prix unitaire est obligatoire";
     }elseif (!is_numeric($value)) {
        $arrayError[$key]="le prix unitaire doit etre numerique" ; 
     }elseif ($value<1) {
        $arrayError[$key]="le prix unitaire doit etre superieur a zero";
     }
}

//validation quantite en stock
function valid_quantite_stock( $value,string $key,&$arrayError):void{
    if (champ_obligatoire($value)) {
        $arrayError[$key]="le quantite en stock est obligatoire";
    }elseif (!is_numeric($value)) {
       $arrayError[$key]="la quantite en stock doit etre numerique" ; 
    }elseif ($value<0) {
       $arrayError[$key]="la quantite en stock doit etre superieur ou egale a zero";
    }
}

function valid_nombre_image( $value,string $key,&$arrayError):void{
    if (champ_obligatoire($value)) {
        $arrayError[$key]="champs obligatoire";
    }elseif (!is_numeric($value)) {
       $arrayError[$key]="le nombre d'image doit etre numerique" ; 
    }elseif ($value<1) {
       $arrayError[$key]="le nombre d'image doit etre superieur a zero";
    }
}

//validation des champs de la categorie
//validation nom de la categorie
function valid_nom_categorie(string $value,string $key,array &$arrayError):void{
    if(champ_obligatoire($value)){
        $arrayError[$key]="le nom de la categorie est obligatoire";
    }
}

//validation des champs de la sous categorie
//validation nom de la sous categorie
function valid_nom_sous_categorie(string $value,string $key,array &$arrayError):void{
    if(champ_obligatoire($value)){
        $arrayError[$key]="le nom de la sous categorie est obligatoire";
    }
}
// validation de la cle etrangere valable pour tout les cles etrangere de type numerique
function valid_cle_etrangere(int $value,string $key,&$arrayError):void{
    if(champ_obligatoire($value)){
        $arrayError[$key]="la cle etrangere est obligatoire";
    }elseif(!is_numeric($value)){
        $arrayError[$key]="la cle etrangere doit etre numerique"; 
    }elseif ($value<1) {
        $arrayError[$key]="la cle etrangere est entre 1 et +l'infini";
    }
}
function form_valid(array $arrayError):bool{
    if (count($arrayError)==0) {
        return true;
    }else{
        return false;
    }
}




?> 