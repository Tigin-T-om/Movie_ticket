<?php include 'connection.php';

extract($_GET);?>

<!DOCTYPE html>
<html>
<head>
<title>Nuptials a Wedding Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Nuptials Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- script -->
	<script src="js/jquery.chocolat.js"></script>
		<!--light-box-files-->
	<script type="text/javascript" charset="utf-8">
		$(function() {
			$('.portfolio-grids a').Chocolat();
		});
	</script>
<!-- script -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
<body >

<style>
    body

    {
        overflow: hidden;
    }
</style>
<!-- banner -->
	<div class="banner" id="home1" style="background: url('images/netflixbg.jpg');">
		<div class="container-floating" style="background: rgba(0,0,0,.6);">
			<div class="banner-phone animated wow slideInLeft" data-wow-delay=".5s">
				<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+0000 123 456</p>
			</div>
			<div class="logo animated wow zoomIn" data-wow-delay=".5s">
				<h1 class="ml-5"><a href="index.html"><span></span>Movie Planner</a></h1>
			</div>
			<div class="banner-social animated wow slideInRight" data-wow-delay=".5s">
				<ul class="social-icons">
					<li><a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a></li>
					<li><a href="#" class="icon-button instagram"><i class="icon-instagram"></i><span></span></a></li>
					<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
					<li><a href="#" class="icon-button g-plus"><i class="icon-g-plus"></i><span></span></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<p>Movie Planner</p>
			</div>
			<div class="navigation">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1" style="position: relative;left: 200px;">
						<nav class="link-effect-14" id="link-effect-14">
							<ul class="nav navbar-nav">
								<li style="visibility: hidden;" class="active"><a href="index.html"><span>Home</span></a></li>
								<li style="visibility: hidden;"><a href="#about" class="scroll"><span>Login</span></a></li>
								<li><a href="index.php" ><span>Home</span></a></li>
								<li><a href="login.php" ><span>Login</span></a></li>
								<li><a href="reg.php" ><span>Registration</span></a></li>
								<li><a href="upcomingmovies.php" ><span>Upcoming Movies</span></a></li>
							
							</ul>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //banner -->
    <?php include 'footer.php' ?> 