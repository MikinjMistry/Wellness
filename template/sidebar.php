	<div class="panel panel-info">
	  <div class="panel-heading">News / Announcement</div>
		<div class="panel-body">
			<marquee scrollamount="2" scrolldelay="1" behavior="scroll" direction="up" onmouseover="this.stop()" onmouseout="this.start()" class="cursor_pointer" height="300px">
				<?php 
						$qry='select * from news where is_active="1"';
						$news=$obj->query($qry);
						//print_r($news);
						
						foreach($news as $key=>$data)
						{
							echo '<div>'.date("d, M y",strtotime($data['date'])).' '.$data['description'].'</div>';
							echo '<div class="hr"></div>'; 
						}
					
				?>
			</marquee>
		</div>
	</div>
	<div class="sidebar-gallery-wrap">
		<div class="panel panel-info">
		  <div class="panel-heading">Gallery</div>
			<div class="panel-body">
				<marquee scrollamount="2" scrolldelay="1" behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()" class="cursor_pointer" height="300px">
					<?php 
						$qry='select * from gallery where is_active="1"';
						$gallery=$obj->query($qry);
						//print_r($news);
						if($gallery)
						{
							foreach($gallery as $key=>$data)
							{
								?>
									<a href="#">
										<img src="uploads/gallery/<?php echo $data['image_path']; ?>" class="padding_left_10px" height="250" width="300">  
									</a>
								<?php 
							}
						}
					?>
				</marquee>
			</div>
		</div>
		
		</div>