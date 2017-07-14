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
    <title>Wellness | Services</title>

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
           <h2>Services</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Services</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

  
  
 <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-9 col-md-9">
                <div class="panel panel-info">
					<div class="panel-heading">
						The University of GEOMEDI
					</div>
					<div class="panel-body">
						<div>
							The university of geomedi was founded in 1998. The founder of university is Dr. Mrs. Marina Pirshalava. The university provides the students with quality education based on the theoritical knowledge and skills and ensures the graduates with competence necessary for their success in their future carrier. Lots of the former graduates have successfully graduated from the working at the best clinics in Georgia and abroad. Students who successfully graduated from the university will be provided employement at the university clinic and its department.
						</div>
						<div class="feature-wrapper">
							<div class="col-md-8">
								<div class="feature-heading">Key Features of the university : </div>
								<div>
									<ul>
										<li>Last Year No Fees.</li>
										<li>MCI preparation from the 4th year.</li>
										<li>German Language Classes from the 4th year.</li>
										<li>Scholarship available up to 1000 USD.</li>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<img src="uploads/home_page_images/geomedi-university.jpg" style="max-height:100%;max-width:100%;"/>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						Caucasus International University
					</div>
					<div class="panel-body">
						<div>
							Caucasus International University is based on the rare principle of creating moral, knowledgeable and well behaved students, those with ability of dealing with present day democracy and carrying out their responsibilities as citizens with successs. The university was establishment in year 1995, amidst hostile political and social condition and its only serving moto was a constant endeavor to improve itself. By virtue of employing dedicated and talented and teaching staff. The university started to attract attention of students within and beyond Georgia and soon became one of the top institute of higher learning in the area.
						</div>
						<div class="feature-wrapper">
							<div class="col-md-4">
								<img src="uploads/home_page_images/caucus_2.jpg" style="max-height:100%;max-width:100%;"/>
							</div>
							<div class="col-md-4">
								<img src="uploads/home_page_images/caucus.jpg" style="max-height:100%;max-width:100%;"/>
							</div>
							<div class="col-md-4">
								<img src="uploads/home_page_images/caucus_3.jpg" style="max-height:100%;max-width:100%;"/>
							</div>
						</div>
					</div>
				</div>
			</div>
              <div class="col-lg-3 col-md-3">
			  
				<?php include_once('template/sidebar.php');?>
			  
					
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <?php
    include_once("template/footer.php");
  ?>
  
  <?php
    include_once("template/script.php");
  ?>
  </body>
</html>