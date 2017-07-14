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
    <title>Wellness Career Consultancy</title>

    <?php
        include_once("template/css.php");
    ?>

  </head>
  <body>
  <?php
    include_once("template/header.php");
    include_once("template/slider.php");
  ?>

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">
            <div class="row">
              <div class="col-lg-9 col-md-9">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
					<div class="home-content-block">
					  <h3>Welcome to Wellness Overseas Consultancy</h3>
					  <!-- End Title -->
					  <p>Wellness career consultancy is a leading education service and guidance providing consultancy founded by Dr.Vimal in 2010. </p>
					  <p>Wellness career consultancy representing maximum colleges and universities in India and overseas.Wellness career consultancy providing the guidance of admission in more than 400 Colleges / Universities of all over India specially in Gujarat, Maharashtra, Karnataka, MP, U.P ,Rajasthan & U.P. By Guidance from our experts, student can secure their admission and then their career in the field of Medical, Paramedical, Engineering and all related professional courses. And they can come out with highest package and prospective job offer.</p>
					  <p>Wellness career consultancy is a solution oriented consultancy who considers the situation and needs of student and their family. Moreover Wellness providing Guidance to the students according to their talent and past result to choose right path for their success in future.</p>
					  <p>Our experts are well experienced who have directed thousands of student in past years. Most of them are toppers in their respective institutions,now they are well established personalities in their field.We are shapping professional world with our innovative approach and enriched experience.</p>
					</div>
					<div class="home-content-block">
					  <h3 class="consultancy-info">Why Wellness Overseas Consultancy ? </h3>
					  <ul>
						<li>We have large informations  base for colleges across India and abroad.</li>
						<li>We will help you to find colleges in accordance with your requirements.</li>
						<li>We will help you to filter Colleges, which meets your budget constraint.</li>
						<li>We will provide all informations regarding admission procedure in those colleges.</li>
						<li>We will keep you posted with all the upcoming events and important dates.</li>
						<li>We will assist on your visit to the colleges of your choice.</li>
						<li>We will guide you throughout the admission procedure.</li>
						<li>We do provide admission to all approved,recognized &amp; Deemed universities  colleges across  India.</li>
					  </ul>
					</div>
					<div>
					<div>&nbsp;</div>
				  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3">

				<?php include_once('template/sidebar.php');?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->
  <!-- Start latest course section -->
  <section id="mu-latest-courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Latest Courses</h2>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="uploads/latestcourses/engineering.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="#">Engineering</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <p>Engineering is the application of mathematics, empirical evidence and scientific, economic, social, and practical knowledge in order to invent, innovate, design, build, maintain, research, and improve structures, machines, tools, systems, components, materials, processes and organizations.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="uploads/latestcourses/mbbs.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="#">MBBS </a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <p>Bachelor of Medicine, Bachelor of Surgery, or in Latin: Medicinae Baccalaureus, Baccalaureus Chirurgiae (abbreviated in many ways, e.g. MBBS, MBChB, MBBCh, MB BChir (Cantab), BM BCh (Oxon), BMBS), are the two first professional degrees in medicine and surgery awarded upon graduation from medical school by universities.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="uploads/latestcourses/dental.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="#">Dental</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <p>A dentist, also known in the U.S. as a dental surgeon, is a surgeon who specializes in dentistry—the diagnosis, prevention, and treatment of diseases and conditions of the oral cavity. The dentist's supporting team aids in providing oral health services.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="uploads/latestcourses/physiotherapy.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="#">Physiotherapy</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <p>Physical therapy or physiotherapy (often abbreviated to PT) is a physical medicine and rehabilitation specialty that remediates impairments and promotes mobility, function, and quality of life through examination, diagnosis, prognosis, and physical intervention (therapy using mechanical force and movements).</p>
                    </div>
                </div>
              </div>

            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest course section -->

  <!-- Start about us counter -->
  <section id="mu-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-globe"></span>
                  <h4 class="counter">62</h4>
                  <p>Countries</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-graduation-cap"></span>
                  <h4 class="counter">350</h4>
                  <p>Successfull Admission</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">35000</h4>
                  <p>Users</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single no-border">
                  <span class="fa fa-university"></span>
                  <h4 class="counter">600</h4>
                  <p>University</p>
                </div>
              </div>
              <!-- End counter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->





  <!-- Start testimonial -->
  <section id="mu-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="uploads/quotes/albert_einstein.jpg" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>By Albert Einstein</h4>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>The freedom to make mistakes provides the best environment for creativity. Education isn't how much you have committed to memory, or even how much you know. It's being able to differentiate between what you know and what you don't.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="uploads/quotes/Anatole_France.jpg" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>By Anatole Franc</h4>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>You have to grow from the inside out. None can teach you, none can make you spiritual. There is no other teacher but your own soul.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="uploads/quotes/Swami-Vivekananda.jpg" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>By Swami Vivekananda</h4>
                </div>
              </div>
              <!-- end testimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	<div class="modal-heading">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<span class="modal-title text-uppercase">Course details inquiry</span>
	</div>
      <div class="modal-body">
       <form class="form-horizontal" method='post' role="form" action="thanks.php">
        <div class="form-group">
        <h5 class="control-label col-sm-4">Course Interested:</h5>
          <div class="col-sm-8">
              <select name="course_id" class="form-control" required>
                <option value="">Select Course</option>
                <?php
                  $course = $obj->select('course');
                  foreach ($course as $key => $value)
                  {
                      echo "<option value=".$value['id'].">".$value['name']."</option>";
                  }
                ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <h5 class="control-label col-sm-4">Student's Name:</h5>
          <div class="col-sm-8">
		  <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-user"></i>
            <input type="text" name='name' class="form-control" placeholder="Enter your name" required>
		  </div>
          </div>
        </div>
        <div class="form-group">
          <h5 class="control-label col-sm-4">Mobile No:</h5>
          <div class="col-sm-8">
		  <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-phone"></i>
            <input type="text" name='phone'  class="form-control" placeholder="Enter mobile number" required>
		  </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-12">
            <input type="submit" value='Submit' name='submit' class="btn submit">
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn text-capitalize" data-dismiss="modal">Skip</button>
    </div>
  </div>
</div>
</div>


  <?php
    include_once("template/footer.php");
  ?>

  <?php
    include_once("template/script.php");
  ?>
  <script>
  $(window).load(function(){
    $("#myModal").modal({
      backdrop:'static'
    })
	setInterval(function(){$("#myModal").modal({
      backdrop:'static'
    });},300000);
  });
</script>
  </body>
</html>
