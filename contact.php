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
    <title>Wellness | Contact</title>

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
           <h2>Contact</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Contact</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

 <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">			
				<div class="col-lg-6 col-md-12">
					<fieldset>
						<legend class="text-center contact-head">GET IN TOUCH</legend>
					</fieldset>
					<div class="mu-our-teacher-single">
						<div class="mu-our-teacher-img col-xs-12 col-sm-6 col-md-4 col-lg-4">
						  <img class="img-responsive teacher" src="assets/img/teachers/vimal.jpg" alt="teacher img">
						  <strong>Dr. Vimal Ghoghari</strong>
						</div>                    
						<div class="col-xs-12 col-sm-6 col-md-8 contact-addr">
						  <p>
						  <h4 style="font-weight: 600">Contact Details:</h4>
						  <strong>Address:</strong> Wellness Overseas Consultancy,
						  603, Lalbhai Contractor Building Nanpura,
						  Surat Gujarat India</p>
						  <p><strong>Phone:</strong> +91 85306 22330 </p>
						  <p><strong>Email:</strong> wellnessoverseas2000@gmail.com</p>
						</div>						
					  </div>
				</div>
				<div class=" col-lg-6 col-md-12">
					<div class="mu-contact-right">
					  <div style="width: 100%"><iframe width="100%" height="415" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=415&amp;hl=en&amp;q=603%20%20Lalbhai%20Contractor%20Building%2C%20Nanpura%20Surat%20Gujarat%20India.+(Wellness%20Career%20Consultancy)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/ru/Создать-Google-Карту/">Создать Google Карту</a> от <a href="http://www.mapsdirections.info/ru/">Рассчитать маршрут</a></iframe></div><br />
					</div>
				</div>              
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->
  <?php
    include_once("template/footer.php");
  ?>
  
  <?php
    include_once("template/script.php");
  ?>
  </body>
</html>