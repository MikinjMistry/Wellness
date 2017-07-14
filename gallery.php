<?php
  include_once("api/wellness.php");
  $obj = new wellness();
  $category = $obj->select('category');
  $sql = 'select g.*,c.name as cname,c.id as cid from gallery g left join category c on g.cat_id = c.id where g.is_active = "1"';
  $images = $obj->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Wellness | Gallery</title>

    <?php
        include_once("template/css.php");
    ?>

  </head>
  <body> 
  <?php
    include_once("template/header.php");
  ?>
   <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Gallery</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            <li class="active">Gallery</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <!-- Start gallery  -->
 <section id="mu-gallery">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-gallery-area">
          <!-- start title -->
          <div class="mu-title">
            <h2 class="page-header">Some Moments</h2>
            <p></p>
          </div>
          <!-- end title -->
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
            <div class="mu-gallery-top">              
              <ul>
                <li class="filter active" data-filter="all">All</li>
                <?php
                  foreach ($category as $key => $value) {
                ?>
                  <li class="filter" data-filter=".<?php echo $value['id']; ?>"><?php echo $value['name']; ?></li>
                <?php
                  }
                ?>
              </ul>
            </div>
            <!-- End gallery menu -->
            <div class="mu-gallery-body">
              <ul id="mixit-container" class="row">
                <!-- start single gallery image -->
                <?php
                  foreach ($images as $key => $value) {
                ?>
                <li class="col-md-4 col-sm-6 col-xs-12 mix <?php echo $value['cid']; ?>">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="uploads/gallery/<?php echo $value['image_path']; ?>"></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4><?php echo $value['title']; ?></h4>
                          <a href="uploads/gallery/<?php echo $value['image_path']; ?>" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>
                          
                        </div>
                      </div>                  
                    </div>
                  </div>
                </li>
                <?php  # code...
                  }
                ?>
                
               
              </ul>            
            </div>
          </div>
          <!-- end gallery content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End gallery  -->

  <?php
    include_once("template/footer.php");
  ?>
  
  <?php
    include_once("template/script.php");
  ?>
  </body>
</html>