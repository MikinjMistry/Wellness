<?php
function check_active($str)
{
  $curr = basename($_SERVER['PHP_SELF'], '.php');
  if($curr == $str)
    return 'active';
  return '';
}
$course = $obj->query("SELECT c.id,c.name,s.id as state_id, s.name as state_name,cs.id as cid from course c 
                        left join course_state cs on c.id = cs.course_id 
                        left join state s on cs.state_id = s.id and s.is_active = '1'");
$course_data = array();
foreach($course as $record)
{
  if (array_key_exists($record['id'],$course_data))
  {
    if($record['state_id'] != null)
    {
      $course_data[$record['id']]['states'][] = array('id'=>$record['state_id'],
        'name'=>$record['state_name'],
        'cid'=>$record['cid']);
    }
  }
  else
  {
    $course_data[$record['id']]['name'] = $record['name'];
    if($record['state_id'] != null)
    {
      $course_data[$record['id']]['states'][] = array('id'=>$record['state_id'],'name'=>$record['state_name'],
        'cid'=>$record['cid']);
    }
  }
}
?>
<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
  <i class="fa fa-angle-up"></i>      
</a>
<!-- END SCROLL TOP BUTTON -->
<!-- Start header  -->
<header id="mu-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-header-area">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="mu-header-top-left">
                
                <div class="mu-top-phone">
                  <i class="fa fa-phone"></i>
                  <span><a href="tel:8530622330">+91 85306 22330</a></span>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="mu-header-top-right">
                <nav>
                  <ul class="mu-top-social-nav">
                    <li><a href="https://www.facebook.com/Wellness-Overseas-1776985142586633" target="_blank"><span class="fa fa-facebook-square"></span></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End header  -->
<!-- Start menu -->
<section id="mu-menu">
  <nav class="navbar navbar-default" role="navigation">  
    <div class="container">
      <div class="navbar-header">
        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- LOGO -->              
        <!-- TEXT BASED LOGO --> 
        <a class="navbar-brand" href="index.php"><img class="wellness_logo" src="uploads/logo.png" ></a>
        <!-- IMG BASED LOGO  -->
        <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
          <li class="<?= check_active('index') ?>"><a href="index.php">Home</a></li> 
          <li class="<?= check_active('gallery') ?>"><a href="gallery.php">Gallery</a></li>           
          <li class="dropdown <?= check_active('course') ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course <span class="fa fa-angle-down"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
              foreach ($course_data as $key => $value) 
              {
                if(empty($value['states']))
                {
                  echo "<li><a href='#'>".$value['name']."</a></li>";                  
                }
                else
                {
                  echo "<li class='dropdown dropdown-submenu'>";
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$value['name']."</a>";
                    echo "<ul class='dropdown-menu'>";
                      foreach ($value['states'] as $k => $v) 
                      {
                        echo "<li><a href='course.php?cid=".base64_encode($v['cid'])."'>".$v['name']."</a></li>";                       
                      }
                    echo "</ul>";
                  echo "</li>";                  
                }
              }  
              ?>
            </ul>
          </li>
          <li class="<?= check_active('services') ?>"><a href="services.php">Services</a></li>           
         
          
          <li class="<?= check_active('inquiry') ?>"><a href="inquiry.php">Inquiry</a></li>
          <li class="<?= check_active('contect') ?>"><a href="contact.php">Contact us</a></li>
          
        </ul>                     
      </div><!--/.nav-collapse -->        
    </div>     
  </nav>
</section>
<!-- End menu -->
<!-- Start search box -->

  
  <!-- End search box -->