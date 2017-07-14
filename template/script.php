<!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
  <!-- Gallery slider -->
  <script type="text/javascript" src="assets/js/gallery-slider-js/custom.js"></script>
  <script type="text/javascript" src="assets/js/gallery-slider-js/custom-slides.js"></script>
  <script type="text/javascript" src="assets/js/gallery-slider-js/custom-slides.js"></script>
  <script type="text/javascript" src="assets/js/gallery-slider-js/custom-1.js"></script>
  <script type="text/javascript" src="assets/js/gallery-slider-js/jquery.carouFredSel-6.1.0-packed.js"></script>


  <!-- Custom js -->
  <script src="assets/js/custom.js"></script>
  <script>
     $('#date').datepicker({
      format:'DD-MM-YYYY'
     });
  </script>

 <script type="text/javascript">
	$('document').ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
		// Avoid following the href location when clicking
		event.preventDefault();
		// Avoid having the menu to close when clicking
		event.stopPropagation();
		// Re-add .open to parent sub-menu item
		if($(this).parent().hasClass('open'))
		{
			$(this).parent().removeClass('open');
			$(this).parent().find("ul").parent().find("li.dropdown").removeClass('open');
		}
		else
		{
			$(this).parent().addClass('open');
			$(this).parent().find("ul").parent().find("li.dropdown").addClass('open');
		}
	});
});
 </script>
