<!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <?php 
		$qry='select * from banner where is_active="1"';
		$banner=$obj->query($qry);
		//print_r($news);
		if($banner)
		{
			foreach($banner as $key=>$data)
			{
				?>
					<div class="mu-slider-single">
					  <div class="mu-slider-img">
						<figure>
						  <img src="uploads/slider/<?php echo $data['image_path']; ?>" alt="img" />
						</figure>
					  </div>
					  
					</div>
				<?php 
			}
		}
	
	?>
    <!-- Start single slider item -->
       
  </section>
  <!-- End Slider -->