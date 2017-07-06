<?php get_header();  ?>

<div class="homeBanner">
	<div class="slide1">
		<div class="container">
			<h2>Slide One</h2>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur molestias illo magnam provident nostrum nemo quod eaque in accusantium laudantium.</h3>
		</div>
	</div>
	<div class="slide2">
		<div class="container">
			<h2>Slide Two</h2>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit laudantium deserunt placeat autem officiis ipsam.</h3>
		</div>
	</div>
	<div class="slide3">
		<div class="container">
			<h2>Slide Three</h2>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, at.</h3>
		</div>
	</div>
</div> <!-- .homeBanner -->

<div class="about" id="about">
	<div class="container">
		<h2>About Me</h2>
	</div> <!-- .container -->
</div> <!-- .about -->

<div class="testimonials">
	<div class="container">
		<div class="testSlider">
			<div class="quote">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis sit reprehenderit ad laudantium ea maiores eaque ullam ratione ducimus officia.</p>
			</div>
			<div class="quote">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis in, maxime pariatur laudantium numquam doloremque?</p>
			</div>
		</div>
	</div> <!-- .container -->
</div> <!-- .testimonials -->

<div class="latestPosts">
	<div class="container">
		<?php
		$args = array(
			'numberposts' => 3,
			'offset' => 0,
			'category' => 0,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'include' => '',
			'exclude' => '',
			'meta_key' => '',
			'meta_value' =>'',
			'post_type' => 'post',
			'post_status' => 'publish',
			'suppress_filters' => true
		);

		$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
		foreach( $recent_posts as $recent ){
				echo '<h2>' . get_the_title($recent["ID"]) . '</h2><a href="' . get_permalink($recent["ID"]) . '">Read Post</a>';
			}
			wp_reset_query();
		?>
	</div> <!-- .container -->
</div> <!-- .latestPosts -->

<div class="counter">
	<div class="container">
		
	</div> <!-- .container -->
</div> <!-- .counter -->

<div class="clients">
	<div class="container">
		
	</div> <!-- .container -->
</div> <!-- .clients -->

<div class="contact" id="contact">
	<div class="container">
		
	</div> <!-- .container -->
</div> <!-- .contact -->

<?php get_footer(); ?>