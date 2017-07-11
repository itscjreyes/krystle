<?php get_header(); ?>
<div class="archiveBanner">
  <div class="container">
	<h1>Search</h1>
  </div>
</div>

<div class="blogListing searchListing">
	<?php if ( have_posts() ) : ?>
		<h2>Search Results for: <?php echo get_search_query(); ?></h2>
		<div class="container">

			<div class="listing">
				<?php get_template_part( 'loop', 'search' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	<?php else : ?>
		<div class="wrapper">
			<h3>Nothing Found</h3>
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div> <!-- /.blogListing -->

<?php get_footer(); ?>
