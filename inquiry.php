<?php
  session_start();
  include_once("api/wellness.php");
  $obj = new wellness();
  $message = '';
  if(isset($_POST['submit']))
  {
    $data = $_POST;
    unset($data['submit']);
    $data['user_ip'] = $_SERVER['REMOTE_ADDR'];
    $data['dob'] = Date('Y-m-d',strtotime($data['dob']));
    if($obj->insert('inquiry',$data) != 0);
    {
        $_SESSION['message'] = "Inquiry Submited successfuly.";
        header("Location:inquiry.php");
    }
  }
  else
  {
    if(isset($_SESSION['message']))
    {
      $message = $_SESSION['message'];
      unset($_SESSION['message']);  
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Wellness Education Consultancy</title>

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
           <h2>Inquiry</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Inquiry</li>
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
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row mu-contact-left">
            <?php
              if(!empty($message))
              {
            ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! </strong><?php echo $message; ?>
              </div>
            <?php
              }
            ?>
            <form method="post" class="contactform" action="inquiry.php">
              <div class="col-md-offset-3 col-md-6 jumbotron">
                <div>
                  <div > 
                    <h2 class="text-center">Inquiry form</h2><br/>
                    <p class="comment-form-email">
                      <label>Student's Name <span class="required">*</span></label>
					  <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-user"></i>
                      <input type="text" class="form-control" name="student_name" placeholder="Enter your name" required>
					  </div>
                    </p>
                    <p class="comment-form-author">
                      <label>Course Interested  <span class="required">*</span></label>
                      <select name="course_id" class="select form-control" required>
                        <option value="">Select Here</option>
                        <?php
                          $course = $obj->select('course');
                          foreach ($course as $key => $value) 
                          {
                              echo "<option value=".$value['id'].">".$value['name']."</option>";
                          }                            
                        ?>
                      </select>
                    </p>
					  <p class="comment-form-url">
                        <label>Mobile No. <span class="required">*</span></label>
						<div class="inner-addon left-addon"> <i class="glyphicon glyphicon-phone"></i>
                        <input type="text" class="form-control" name="mobile_no" placeholder="Enter mobile number" required pattern="[0-9]{10}" title="Mobile Number must be 10 Charector">  
						</div>
					  </p>
					  <p class="comment-form-url">
                        <label>Email</label>
						<div class="inner-addon left-addon"> <i class="glyphicon glyphicon-envelope"></i>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email"> 
						</div>
                      </p>
					  <p class="form-submit">
						  <input type="submit" value="Submit" class="btn btn-primary" name="submit">
					  </p>
                    </div>       
                </div>
              </div>
            </form>
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