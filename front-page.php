<?php get_header();  ?>

<div class="homeBanner">
	<?php

	if(get_field('banner_slider')): ?>

		<?php while(the_repeater_field('banner_slider')): ?>
			<div class="slide" style="background-image:url(<?php the_sub_field('slide_image'); ?>);">
				<div class="container">
					<?php the_sub_field('slide_text'); ?>
				</div>
			</div>
		<?php endwhile; ?>

	 <?php endif; ?>
</div> <!-- .homeBanner -->

<div class="about" id="about">
	<div class="container">
		<h2>About Me</h2>
	</div> <!-- .container -->
</div> <!-- .about -->

<div class="testimonials">
	<div class="container">
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

<div class="latestPosts">
	<div class="container">
		<?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>`

		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

		<a class="blogPost" href="<?php the_permalink(); ?> ">
			<div class="postImgWrapper">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
				  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				  <div class="postImg" style="background-image: url('<?php echo $image[0]; ?>')">
				  </div>
				<?php endif; ?>
				<span>Read Post</span>
			</div>
			<p class="postDate"><?php the_time('F j, Y'); ?></p>
			<h4><?php the_title(); ?></h4>
		</a>

		<?php
		endwhile;
		wp_reset_postdata();
		?>

	</div> <!-- .container -->
</div> <!-- .latestPosts -->

<div class="counter">
	<div class="container">
		<div class="count1">
			<p id="odometer1" class="odometer countNumber">0</p>
			<p class="countText">Lorem ipsum dolor</p>
		</div>
		<div class="count2">
			<p id="odometer2" class="odometer countNumber">0</p>
			<p class="countText">Lorem ipsum dolor</p>
		</div>
		<div class="count3">
			<p id="odometer3" class="odometer countNumber">0</p>
			<p class="countText">Lorem ipsum dolor</p>
		</div>
	</div> <!-- .container -->
</div> <!-- .counter -->

<div class="clients">
	<div class="container">
		<div class="clientLogos">
			<?php the_field('client_text') ?>

			<?php

			if(get_field('clients')): ?>

				<?php while(the_repeater_field('clients')): ?>
					<img src="<?php the_sub_field('client_logo'); ?>" alt="">
				<?php endwhile; ?>

			 <?php endif; ?>
		</div>
	</div> <!-- .container -->
</div> <!-- .clients -->

<div class="contact" id="contact">
	<div class="container">
		<div class="instagramFeed"></div>
	</div> <!-- .container -->
</div> <!-- .contact -->

<?php get_footer(); ?>