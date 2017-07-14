<?php
  include_once("api/wellness.php");
  $obj = new wellness();
  $clg = array();
  $data = array();
  if(isset($_GET['cid']))
  {
    $cid = base64_decode($_GET['cid']);
    $sql = 'select * from college where course_state_id='.$cid;
    $clg = $obj->query($sql); 
    $str = 'select s.name as sname,c.name cname from course_state cs 
    left join state s on s.id = cs.state_id 
    left join course c on c.id = cs.course_id 
    where cs.id='.$cid;
    $data = $obj->query($str); 
  }
  else
  {
      header("location:404.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Wellness | Course</title>

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
           <h2>Courses</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            <li>Courses</li>
            <li ><?php echo $data[0]['cname']; ?></li>
            <li class="active"><?php echo $data[0]['sname']; ?></li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>

<section id="mu-contact">
   <div class="container">
     <div class="row">
                      
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <?php
                if(empty($clg))
                {
              ?>
                <div class="alert alert-success text-center">
                  No colleges found.
                </div>
              <?php    
                } 
                else
                {
              ?>

              <div class="table-responsive">
                <table class="table table-bordered table-hover course-table">
                  <tr>
                    <th>
                      COLLEGE NAME
                    </th>
                    <th>
                      AFFILETED UNIVERSITY
                    </th>
                    <th>
                      IN TAKE
                    </th>
                    <th>
                      website
                    </th>
                  </tr>
                  <?php
                    foreach ($clg as $key => $value) 
                    {
                    
                  ?>
                  <tr>
                    <td>
                      <a href="college_detail.php?id=<?php echo base64_encode($value['id']) ?>">
                        <?php
                            echo $value['name'];
                        ?>
                        </a>
                    </td>
                    <td>
                        <?php

                            if(empty($value['university']))
                            {
                              echo "---";  
                            }
                            else
                            {
                              echo $value['university'];
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if(empty($value['available_seat']))
                            {
                              echo "---";  
                            }
                            else
                            {
                              echo $value['available_seat'];
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if(empty($value['website']))
                            {
                              echo "---";  
                            }
                            else
                            {
                              echo $value['website'];
                            }
                        ?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </div>  
              <?php
                }
              ?>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
     
   </div>
 </section>
 <!-- End breadcrumb -->

  <?php
    include_once("template/footer.php");
  ?>
  
  <?php
    include_once("template/script.php");
  ?>
  </body>
</html>