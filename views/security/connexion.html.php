<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
?>

<?php 
require(ROUTE_DIR.'public/inc/header.html.php');
?>

  <?php 
  require(ROUTE_DIR.'public/inc/menu.html.php');
?>
 
<div class="container-fluid bg-light">
      
<div class="container "  style="width:80%;height:500px;background-image:url('img/29.jpeg');">      
      <div class="container ">
          <div class="row">
          
              <div class="col md-6">
              
              <h3 class="abdou" style="margin-left:25%;color:#f17503;margin-top:5%;">Se connecter</h3>

              <form   action="<?= WEB_ROUTE ?>" method="POST" > 
                    <input type="hidden" name="controllers" value="security">
                    <input type="hidden" name="action" value="connexion">

                          <div class="form-group mt-5">
                    <label for="login">login</label>
                    <input type="text" name="login_u" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text" style="color:#f17503;">
                    <?= isset($arrayError['login_u']) ? $arrayError['login_u'] : '' ;?>
                    </small>
                  </div>
                  <div class="form-group mt-5">
                    <label for="password">password</label>
                    <input type="password" name="password_u" id="change" class="form-control" placeholder="" aria-describedby="helpId" >
                    <img src="img/01.png" class="img-fluid ${3|rounded-top,rounded-right,
                      rounded-bottom,rounded-left,rounded-circle,|}" id="im"  style="margin-left:90%;margin-top:-13%;" alt="" Onclick="changer()">
                    <small id="helpId" class="text" style="color:#f17503;" >
                    <?= isset($arrayError['password_u']) ? $arrayError['password_u'] : '' ;?>
                    </small>
                  </div>
                      <a href="<?= WEB_ROUTE.'?controllers=security&views=forgot' ?>" class="card-link mt-5" style="color:#f17503; margin-left:60%;">Mot de pass oublier ?</a>
                      <div class="button" >
                        <button type="submit" name="submit" class="btn" style="width:450px; margin-top:8%; 
                        background:#f17503; color:white;">Se connecter</button>
                      </div>
                   
                      </form>  
                  </div>
               
          
              <div class="col md-6"style="border-left:1px solid black;">
                     <h3 class="sene" style="margin-left:25%;color:#f17503;margin-top:5%;">Creer un compte</h3>
                     <h4 class="texte" style="margin-left:25%;margin-top:5%;">
                     Créez votre compte client SEN SHOP en quelques clics!</br>
                      Pour acceder a plus de fonctionnalites vous</br>
                      devez cliquer sur creer un compte afin de remplir le </br>
                      formulaire d'inscription correctement
                     </h4>
                     <div class="button" >
                        <a name="submit" id="" class="btn btn" style="width:450px; margin-top:17.5%;   
                        background:#f17503; color:white;"
                         href="<?= WEB_ROUTE.'?controllers=security&views=inscription' ?>" role="button">Creer un compte</a>
                      </div>
              </div>
         </div>
         
      </div>
</div>     
</div>
<script>
  e=true;
  function changer(){
    if(e){
      document.getElementById("change").setAttribute("type","text");
      document.getElementById("im").src="img/00.png";
      e=false;


    }else{
      document.getElementById("change").setAttribute("type","password");
      document.getElementById("im").src="img/01.png";
      e=true;
    }
  }
</script>
<?php 
  require(ROUTE_DIR.'public/inc/footer.html.php');
?>
