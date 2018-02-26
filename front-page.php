<?php get_header();  ?>

<div class="homeBanner" id="home">
	<div class="slide slide1">
		<div class="container">
			<h2 class="active">Create.</h2>
			<h2>Connect.</h2>
			<h2>Explore.</h2>
			<h2 class="handwritten">Aloha.</h2>
		</div>
	</div>
	<div class="slide slide2">
		<div class="container">
			<h2>Create.</h2>
			<h2 class="active">Connect.</h2>
			<h2>Explore.</h2>
			<h2 class="handwritten">Aloha.</h2>
		</div>
	</div>
	<div class="slide slide3">
		<div class="container">
			<h2>Create.</h2>
			<h2>Connect.</h2>
			<h2 class="active">Explore.</h2>
			<h2 class="handwritten">Aloha.</h2>
		</div>
	</div>
	<div class="slide slide4">
		<div class="container">
			<h2>Create.</h2>
			<h2>Connect.</h2>
			<h2>Explore.</h2>
			<h2 class="active handwritten">Aloha.</h2>
		</div>
	</div>
</div> <!-- .homeBanner -->

<div class="about" id="about">
	<div class="container">
		<h2>About</h2>
		<div class="aboutWrapper">
			<div class="aboutImg">
				<img src="<?php the_field('about_image') ?>" alt="">
			</div>
			<div class="aboutText">
				<?php the_field('about_text') ?>
			</div> <!-- .aboutText -->
		</div> <!-- .aboutWrapper -->
	</div> <!-- .container -->
</div> <!-- .about -->

<div class="testimonials">
	<div class="container">
		<img src="http://cjreyes.ca/krystle/wp-content/uploads/2017/08/quotes.png" alt="">
		<div class="testSlider">
			<?php

			if(get_field('testimonials')): ?>

				<?php while(the_repeater_field('testimonials')): ?>
					<div class="quote">
						<p class="quoteText"><?php the_sub_field('quote'); ?></p>
						<p class="quoteName"><?php the_sub_field('name'); ?></p>
					</div>
				<?php endwhile; ?>

			 <?php endif; ?>
		</div>
	</div> <!-- .container -->
</div> <!-- .testimonials -->

<div class="latestPosts" id="blog">
	<div class="container">
		<h2>Journal</h2>
		<div class="latestWrapper">
			<?php $the_query = new WP_Query( 'posts_per_page=6' ); ?>

			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

			<a class="blogPost" href="<?php the_permalink(); ?> ">
				<div class="postImgWrapper">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<div class="postImg" style="background-image: url('<?php echo $image[0]; ?>')">
						</div>
					<?php endif; ?>
					<span>Read More</span>
				</div>
				<h4><?php the_title(); ?></h4>
				<p><?php the_excerpt(); ?></p>
				<p class="postDate"><?php the_time('d F Y'); ?> &middot; <span class="postComments"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></span></p>
			</a>

			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<a href="<?php echo home_url(); ?>/journal" class="borderButton">View All</a>
	</div> <!-- .container -->
</div> <!-- .latestPosts -->

<div class="clients">
	<div class="container">
		<h2>Clients</h2>
		<?php the_field('client_text') ?>
		<div class="clientLogosContainer">
			<div class="clientLogos">
				<?php

				if(get_field('clients')): ?>

					<?php while(the_repeater_field('clients')): ?>
						<div class="clientLogo"><img src="<?php the_sub_field('client_logo'); ?>" alt=""></div>
					<?php endwhile; ?>

				 <?php endif; ?>
			</div>
		</div>
	</div> <!-- .container -->
</div> <!-- .clients -->

<div class="contact" id="contact">
	<div class="container">
		<div class="instagramFeed"></div>
		<div class="contactForm">
			<h2><span class="handwritten">Thanks</span> for stopping by</h2>
			<p>If you have any questions, contact me. My door is always open.</p>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // end the loop?>
		</div>
	</div> <!-- .container -->
</div> <!-- .contact -->

<?php get_footer(); ?>