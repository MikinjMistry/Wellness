<?php
  include_once("api/wellness.php");
  $obj = new wellness();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Wellness | page not found</title>

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
           <h2>404</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

  <!-- Start error section  -->
  <section id="mu-error">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
          <div class="mu-error-area">
            <p>Oops! The page you requested was not found!</p>
            <span>The page you are looking for is not available or has been removed or changed.</span>
            <h2>404</h2>
            <a class="mu-post-btn" href="index.php">GO TO HOME</a>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- End error section  -->

  <?php
    include_once("template/footer.php");
  ?>
  
  <?php
    include_once("template/script.php");
  ?>
  </body>
</html>