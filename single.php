<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="banner blogBanner" style="background-image: url('<?php echo $image[0]; ?>')">
	<?php endif; ?>
		<div class="container">
			<span><?php the_date('d F, Y'); ?></span>
			<h2><?php the_title(); ?></h2>
		</div>
	</div>

	<div class="singlePost">
		<div class="container">

			<div class="postContent">
				<?php the_content(); ?>
				<?php wp_link_pages(array(
					'before' => '<div class="page-link"> Pages: ',
					'after' => '</div>'
				)); ?>
				<div class="categoryTags"><span>Categories:</span> <?php the_category(' '); ?></div>
			</div><!-- .postContent -->

			<div class="postNav">
				<p class="nav-previous"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> Prev'); ?></p>
				<p class="nav-next"><?php next_post_link('%link', 'Next <i class="fa fa-angle-right"></i>'); ?></p>
			</div><!-- #nav-below -->

		</div> <!-- /.container -->
	</div> <!-- /.singlePost -->

	<div class="relatedPosts">
		<div class="container">
			<h2>Related</h2>
			<div class="relatedListing">
				<?php
				// Default arguments
				$args = array(
					'posts_per_page' => 3, // How many items to display
					'post__not_in'   => array( get_the_ID() ), // Exclude current post
					'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
				);

				// Check for current post category and add tax_query to the query arguments
				$cats = wp_get_post_terms( get_the_ID(), 'category' ); 
				$cats_ids = array();  
				foreach( $cats as $wpex_related_cat ) {
					$cats_ids[] = $wpex_related_cat->term_id; 
				}
				if ( ! empty( $cats_ids ) ) {
					$args['category__in'] = $cats_ids;
				}

				// Query posts
				$wpex_query = new wp_query( $args );

				// Loop through posts
				foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>

					<a class="blogPost relatedPost" href="<?php the_permalink(); ?> ">
						<div class="postImgWrapper">
	    					<?php if (has_post_thumbnail( $post->ID ) ): ?>
	    					  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	    					  <div class="postImg" style="background-image: url('<?php echo $image[0]; ?>')">
	    					  </div>
	    					<?php endif; ?>
	    					<span>Read Post</span>
						</div>
	    				<h4><?php the_title(); ?></h4>
						<p class="postDate"><?php the_time('d F, Y'); ?></p>
					</a>

				<?php
				// End loop
				endforeach;

				// Reset post data
				wp_reset_postdata(); ?>
			</div> <!-- .relatedListing -->
		</div> <!-- .container -->
	</div> <!-- .relatedPosts -->

	<div class="blogComments">
		<div class="container">
			<?php comment_form(array('title_reply'=>'Leave a Comment')); ?>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>