<?php $post_id = get_the_id(); ?>
 <div id="blog-post-<?php echo $post_id; ?>" class="blog-post" data-container-for="<?php the_permalink(); ?>">
	<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>" data-content-target="#blog-post-<?php echo $post_id; ?>"> <?php the_title(); ?> </a> </h2>
	<p class="blog-post-meta"><?php the_date(); ?> by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></p>
	<div class="blog-post-content">
		<?php the_content(); ?>
		<?php edit_post_link(); ?>
	</div>
</div><!-- /.blog-post -->
