<?php
if(!defined('MyValidation')) {
	exit("<h2 align='center'>You are not allowed to see content of this page!</h2><div align='center'><a href='https://www.eastwoodcondo.com'>www.eastwoodcondo.com</a></div>");
}
?>

		<div class="col-md-7" align="center">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php echo $car; ?>			
				</ol>

			<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php echo $pic; ?>
				</div>

			<!-- Left and right controls -->
 				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>