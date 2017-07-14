  <?php
    include_once("api/wellness.php");
    $obj = new wellness();
    if(isset($_GET['id']))
    {
      $id = base64_decode($_GET['id']);
      $sql = 'select * from college where id='.$id;
      $clg = $obj->query($sql);

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
    }
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">    
      <title>Wellness | detail</title>

      <?php
          include_once("template/css.php");
      ?>

    </head>
    <body> 
    <?php
      include_once("template/header.php");
    ?>
    <section id="mu-page-breadcrumb">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="mu-page-breadcrumb-area">
             <h2><?php echo $clg[0]['name'] ?></h2>
             <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>            
              <li class="active"><?php echo $clg[0]['name'] ?></li>            
              
            </ol>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section id="mu-error" class="clg-details-container">
      <div class="container">
        <div class="row">
        <div class="col-md-3 col-sm-3 clg-left-menu">
             <div class="row">
			<div id="left" class="span3">
              
              <?php
                foreach ($course_data as $key => $value) {
                ?>
                  <ul id="menu-group-<?php echo $key; ?>" class="nav menu"> 
                  <?php
                    if(is_array($value['states']))
                    {
                  ?>
                  <li class="item-1 deeper parent active">
                      <a class="" data-toggle="collapse" data-parent="#menu-group-<?php echo $key; ?>" href="#sub-item-<?php echo $key; ?>" href="#">
                          <span class="lbl">
                            <?php echo $value['name'] ?>
                          </span> 
						  <i class="pull-right fa fa-caret-down"></i>
                      </a>
                      <ul class="children nav-child unstyled small collapse" id="sub-item-<?php echo $key; ?>">
                        <?php
                          foreach ($value['states'] as $k => $v) {
                        ?>
                          <li class="item-2 deeper parent active">
                              <a class="" href="course.php?cid=<?php echo base64_encode($v['cid']); ?>">
                                  <span class="lbl"><?php echo $v['name'] ?></span> 
                              </a>
                          </li>
                        <?php    
                          }
                        ?>
                      </ul>
                  <?php  
                    }
                    else
                    {
                      ?>
                      <li class="item-1 deeper parent active">
                      <a class="" href="#">
                          <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign">
                          <i class="icon-plus icon-white"></i></span>
                          <span class="lbl">
                            <?php echo $value['name'] ?>
                          </span>                      
                      </a>
                      </li>
                      <?php
                    }
                  ?>
                  </ul>
              <?php  
                }
              ?>
                        
      </div>
    </div>
        </div>
         <div class="col-md-9 col-sm-9 clg-desc">
            <?php echo $clg[0 ]['description'] ?>
        </div>
      </div>
    </div>
  </section>

    <?php
      include_once("template/footer.php");
    ?>
    
    <?php
      include_once("template/script.php");
    ?>
    
	<script>
	$('document').ready(function(){
		$(".clg-desc img").removeAttr("style");
		$(".clg-desc img").addClass("img-responsive");
	});
	</script>
    </body>
  </html>