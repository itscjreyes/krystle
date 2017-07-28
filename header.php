<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- stylesheets should be enqueued in functions.php -->
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>


<header>
	<div class="container">
		<h1>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
				Krystle Reyes
			</a>
		</h1>

		<a class="mobileMenu" href="">
			<span></span>
			<span></span>
			<span></span>
		</a>

		<nav>
			<ul class="menu">
				<li><a href="<?php echo home_url(); ?>/#home" class="smooth">Home</a></li>
				<li><a href="<?php echo home_url(); ?>/#about" class="smooth">About</a></li>
				<li><a href="<?php echo home_url(); ?>/#blog" class="smooth">Journal</a></li>
				<li class="has-submenu"><a href="<?php echo home_url(); ?>/#contact" class="smooth">Contact</a>
					<ul class="subMenu">
						<li><a href="#"><span>Facebook</span><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><span>Instagram</span><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><span>Pinterest</span><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><span>Twitter</span><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><span>LinkedIn</span><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</li>
				<li><?php get_search_form(); ?></li>
			</ul>
		</nav>
	</div> <!-- /.container -->
</header><!--/.header-->