<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="banner blogBanner" style="background-image: url('<?php echo $image[0]; ?>')">
<?php endif; ?>
	<div class="container">
		<span>Latest</span>
		<?php
		$args = array(
			'numberposts' => 1,
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
	</div>
</div>

<div class="blogListing">
  <div class="container">
    <div class="listing">
    	<?php 
    		if( have_posts() ) {
    			while( have_posts() ) {
    				the_post();
    			?>
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
    			}
    		}
    	 ?>
    </div> <!--/.listing -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>