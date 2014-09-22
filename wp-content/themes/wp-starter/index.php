<?php get_header(); ?>
<!-- Generating Template: <?php echo basename(__FILE__, '.php'); ?>.php -->


<div class="row">
	<div class="col-sm-8 blog-main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->
		<div class="blog-post">
			<h2 class="blog-post-title"><?php the_title(); ?></h2>
			<p class="blog-post-meta"><?php the_date(); ?> by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></p>
			<div class="blog-post-content">
				<?php the_content(); ?>
			</div>
		</div><!-- /.blog-post -->
	<?php endwhile; ?>
	<ul class="pager">
		<li><a href="#">Previous</a></li>
		<li><a href="#">Next</a></li>
	</ul>
	<!-- post navigation -->
	<?php else: ?>
		<h2>No Posts Found</h2>
	<?php endif; ?>
	</div><!-- /.blog-main -->

	<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
		
	</div><!-- /.blog-sidebar -->

</div>

<?php get_footer(); ?>

