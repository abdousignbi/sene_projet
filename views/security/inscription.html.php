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
      
<div class="container "  style="width:60%;height:530px;background-image:url('img/29.jpeg');">      
      <div class="container ">
      <h3 class="abdou" style="margin-left:25%;color:#f17503;margin-top:0%;">Creer votre compte</h3>
        
      <form   action="<?= WEB_ROUTE ?>" method="POST" > 
                    <input type="hidden" name="controllers" value="security">
                    <input type="hidden" name="action" value="inscription">

      <div class="row">
              <div class="col md-3">
              <div class="form-group">
                  <label for="">id_role</label>
                  <select class="form-control" name="role" id="ok">
                    <?php foreach ($roles as $role):?>
                    <option value="<?=$role['id_role'] ?>"><?=$role['nom_role'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>  
           </div> 


         <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nom">nom</label>
                <input type="text" name="nom_user" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text" class="text" style="color:#f17503;">
                <?= isset($arrayError['nom_user']) ? $arrayError['nom_user'] : '' ;?>
                </small>
              </div>
            </div>
             

            <div class="col-md-6">
              <div class="form-group">
                <label for="prenom">prenom</label>
                <input type="text" name="prenom_user" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text" class="text" style="color:#f17503;">
                <?= isset($arrayError['prenom_user']) ? $arrayError['prenom_user'] : '' ;?>
                </small>
              </div>
            </div>
         </div>


          <div class="row">
              <div class="col md-3">
                   <div class="form-group mt-5">
                    <label for="login">login</label>
                    <input type="text" name="login_u" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text" style="color:#f17503;">
                    <?= isset($arrayError['login_u']) ? $arrayError['login_u'] : '' ;?>
                    </small>
                  </div>
              </div>   

              <div class="col md-6">
                  <div class="form-group mt-5">
                    <label for="password">password</label>
                    <input type="password" name="password_u" id="change" class="form-control" placeholder="" aria-describedby="helpId" >
                    <img src="img/01.png" class="img-fluid ${3|rounded-top,rounded-right,
                      rounded-bottom,rounded-left,rounded-circle,|}" id="im"  style="margin-left:90%;margin-top:-17%;" alt="" Onclick="changer()">
                    <small id="helpId" class="text" style="color:#f17503;" >
                    <?= isset($arrayError['password_u']) ? $arrayError['password_u'] : '' ;?>
                    </small>
                 </div>
               </div>
             </div>
                   <div class="button" >
                        <button type="submit" name="submit" class="btn" 
                        style="width:450px;margin-left:15%; margin-top:8%; 
                        background:#f17503; color:white;">Se connecter</button>
                      </div>

                    </form>
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