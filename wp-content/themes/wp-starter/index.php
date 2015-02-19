<?php get_header(); ?>
<!-- Generating Template: <?php echo basename(__FILE__, '.php'); ?>.php -->


<div class="row">
	<div class="col-sm-8 blog-main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_id(); ?>
		<?php get_template_part( 'post', 'single' ); ?>
	<?php endwhile; ?>
		<?php get_template_part( 'post', 'navigation' ); ?>
	<?php else: ?>
		<h2>No Posts Found</h2>
	<?php endif; ?>
	</div><!-- /.blog-main -->
	<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- /.blog-sidebar -->

</div>

<?php get_footer(); ?>

