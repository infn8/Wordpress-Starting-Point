<?php get_header(); ?>
<!-- Generating Template: <?php echo basename(__FILE__, '.php'); ?>.php -->


<div class="row">
	<div class="col-sm-8 blog-main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->
		<div class="blog-post">
			<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>
			<p class="blog-post-meta"><?php the_date(); ?> by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></p>
			<div class="blog-post-content">

				<?php

				$update_data = wp_get_update_data();
				$test = number_format_i18n($update_data['counts']['total']);
		$update_plugins = get_site_transient( 'update_plugins' );

				var_pre($update_plugins, '$update_plugins');
				 ?>
				<?php the_content(); ?>
				<?php edit_post_link(); ?>
			</div>
		</div><!-- /.blog-post -->
	<?php endwhile; ?>


<?php
	$previousLink = get_previous_posts_link();
	$nextLink = get_next_posts_link();
?>


	<ul class="pager">
		<?php if (!empty($previousLink)) { ?>
			<li><?php echo $previousLink; ?></li>
		<?php } ?>
		<?php if (!empty($nextLink)) { ?>
			<li><?php echo $nextLink; ?></li>
		<?php } ?>
	</ul>
	<!-- post navigation -->
	<?php else: ?>
		<h2>No Posts Found</h2>
	<?php endif; ?>
	</div><!-- /.blog-main -->

	<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- /.blog-sidebar -->

</div>

<?php get_footer(); ?>

