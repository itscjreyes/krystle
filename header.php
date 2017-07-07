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
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <li><a href="<?php echo home_url(); ?>/#about" class="smooth">About</a></li>
        <li><a href="<?php echo home_url(); ?>/blog">Blog</a></li>
        <li><a href="<?php echo home_url(); ?>/#contact" class="smooth">Contact</a></li>
      </ul>
    </nav>
  </div> <!-- /.container -->
</header><!--/.header-->