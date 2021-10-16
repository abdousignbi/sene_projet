<?php 
require(ROUTE_DIR.'public/inc/header.html.php');
?>

  <?php 
  require(ROUTE_DIR.'public/inc/menu.html.php');
  ?>

<div class="jumbotron text-center p-3 bg-white" style="margin-left:13%; margin-right:0%">
            <h1 class="display-3">Ordinateurs portable</h1>  
          </div>

<div class="container-fluid  " style="margin-top:0%; width:70%;">
          <div class="row ">
            <!-- partie chargement des images dans la page -->

            <?php 
     $nombrePage=0;
     $precedent=1;
     $page=0;
     $ok1=1;
     $ok2=0;
     $ok3=0;
     $ok4=0;
     $ok5=0;
     $suivant=0;
     
     if (!isset($_GET['page'])) {
      $page=1;
      $_SESSION['images'] = $images;
      $nombrePage=nombrePageTotal(  $_SESSION['images'],6);
      $image=get_element_to_display(  $_SESSION['images'],$page,6);  
      }
      if (isset($_GET['page'])) {
        $page=$_GET['page'];

        $suivant=$page+1;
        $precedent=$page-1;
        $nombrePage=nombrePageTotal(  $_SESSION['images'],6);
        $image=get_element_to_display(  $_SESSION['images'],$page,6);

      }
     ?>

        <?php foreach ($image as $key => $value):?>
            <?php if (str_contains($value['nom_image'], 'po')=='true'):?>
     <div class="col-md-4">
       <div class="card" style="height:25%;">
             <img  
             src="img/<?php echo $value['nom_image']?> " class="card-img-top 
             ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
          <div class="card-body">
              <h5 class="card-title"><span class="badge badge-succes">
              <span class="badge badge-primary" style="color:#f17503;"><?=$value['prix_unitaire'] ?></span>
              <span class="badge badge-primary" style="color:#f17503;"><?=$value['description'] ?></span>
              <span class="badge badge-primary" style="color:#f17503;"><?=$value['quantite_stock'] ?> </br> 
                 </span>
            </h5>
              
         </div>   
        </div>
     </div>
     <?php endif ?> 
  <?php endforeach ?> 
   </div>
     <!-- partie paggination -->
  <div class="row text-center">
        <div class="col-sm-4 offset-sm-4">
          <ul class="pagination pl-4">
          <?php if($page<=1):?>
              <li class="page-item disabled ">
                <a class="page-link desable" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$precedent?>">&laquo;</a>
              </li>
              <?php else:?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$precedent?>">&laquo;</a>
              </li>
                <?php endif ?>
              
              <?php if($page==2):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$ok2?>">1</a>
              </li>
              <?php elseif($page!=2):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$ok2?>">1</a>
              </li>
              <?php endif ?>
              <?php if($page==3):?>
              <li class="page-item active">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$ok3?>">2</a>
              </li>
              <?php elseif($page!=3):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$ok3?>">2</a>
              </li>
              <?php endif ?>
              <?php if($nombrePage>$page):?>
              <li class="page-item disable">
                <a class="page-link " href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$suivant?>">&raquo;</a>
              </li>
              <?php elseif($nombrePage<$page ):?>
                <li class="page-item ">
                <a class="page-link" href="<?=WEB_ROUTE.'?controllers=user&views=portable&page='.$suivant?>">&raquo;</a>
              </li>
              <?php endif ?>
            </ul>
        </div>
 </div>  
 </div>




<?php 
require(ROUTE_DIR.'public/inc/footer.html.php');
?>
