<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<?php 

    $args = array('showposts' => 1);

    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ): 

        while ( $the_query->have_posts()) : $the_query->the_post();

        	$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

            echo '<div class="banner blogBanner" style="background-image:url('. $featuredImage .')"><div class="container"><span>Latest</span><h2>'.get_the_title().'</h2><a href="'.get_the_permalink().'">Read More</a></div></div>';
        endwhile; 

    endif; 

    wp_reset_query(); 
?>



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
	    					<span>Read More</span>
    					</div>
    					<h4><?php the_title(); ?></h4>
    					<p><?php the_excerpt(); ?></p>
    					<p class="postDate"><?php the_time('d F, Y'); ?> &middot; <span class="postComments"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></span></p>
    				</a>
    			<?php 
    			}
    		}
    	 ?>

    	 <?php numeric_posts_nav(); ?>
    </div> <!--/.listing -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>