<?php 
//define("WEB_ROUTE" , "http://seneabdou.alwaysdata.net/");
define("WEB_ROUTE" , "http://localhost:8000/");
DEFINE('HOST_BD','127.0.0.1');
define('ROUTE_DIR', str_replace ('public', '' , $_SERVER['DOCUMENT_ROOT']));
define("USER_DB" , 'root' );
define("PASSWORD_DB" , "" );
define("CHAINE_DE_CONNEXION" , 'mysql:dbname=SENE_PROJET;host='.HOST_BD );
//define("NOMBRE_PAR_PAGE" , 5 );
//define("NOMBRE_PAR_PAGE_DE_JEU" , 1 );
?>