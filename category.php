<?php get_header(); ?>

<div class="archiveBanner">
  <div class="container">
    <h1><?php single_cat_title(); ?></h1>
  </div>
</div>

<div class="blogListing">
  <div class="container">
      <div class="listing">
    	<?php
    		$category_description = category_description();
    		if ( ! empty( $category_description ) )
    			echo '' . $category_description . '';
    	   get_template_part( 'loop', 'category' );
        ?>
        </div>
    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.blogListing -->

<?php get_footer(); ?>