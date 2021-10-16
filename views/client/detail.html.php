      <?php 
      require(ROUTE_DIR.'public/inc/header.html.php');
      ?>

          <?php 
          require(ROUTE_DIR.'public/inc/menu.html.php');
          ?>


    <div class="container-fluid bg-light " style="margin-top:%;">
          <div class="container bg-light " style="margin-top:%; width:80%;">
            <div class="row ">
                <div class="col-md-8">
                     <div class="card" style="height:25%; margin-top:10%; margin-left:30%; ">
                          <img  
                          src="img/<?php echo $image[0]['nom_image'] ?> " class="card-img-top 
                          ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                         <div class="card-body">
                            <h5 class="card-title"><span class="badge badge-succes">
                                <span class="badge badge-primary" style="color:#f17503;">son prix unintaire est <?= $image[0]['prix_unitaire'] ?></span>
                                <span class="badge badge-primary" style="color:#f17503;">quantite stock est <?= $image[0]['quantite_stock'] ?></span>
                                <span class="badge badge-primary" style="color:#f17503;">sa description est <?= $image[0]['description'] ?>
                                  </span>
                            </h5>
                                </hr>
                            </hr>
                         </div>   
                       </div>
                   </div>
               </div>
   </div>
   </div>
         
              <?php 
                require(ROUTE_DIR.'public/inc/footer.html.php');
              ?>
<style>
   ul li a{
    text-decoration:none; 
  }
  .wrapper2{
    display: none;
  }
  .wrapper ul li:hover .wrapper2{
    display:block;
    position:absolute;
     
  }
  ul li{
    text-decoration:none;
  }
</style>