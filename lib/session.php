<?php 
//Ouvrir une session
function open_session(){
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
}
function destroy_session(){
    session_destroy();
}

function est_connect():bool{
    return isset($_SESSION['userConnect']);
    
}
 
function est_client():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='role_client';
}
function est_gestionnaire():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='role_admin';
}

?>