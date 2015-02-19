<?php get_header(); ?>
<!-- Generating Template: <?php echo basename(__FILE__, '.php'); ?>.php -->
<div class="row">
	<div class="col-sm-8 blog-main">
<?php
	global $post, $is_original_post;
	$o_post = $post;
	$o_id = $o_post->ID;
	$ppp = get_option('posts_per_page');
?>
<?php $args = array(
	"post_type" => "post",
	"post_status" => "publish",
	"posts_per_page" => "-1",
	"orderby" => "date",
	"order" => "DESC"
);
$query = new WP_Query($args);
if($query->have_posts()): while($query->have_posts()):  $query->the_post(); ?>
	<?php
		$post_id = get_the_id();
		$is_original_post = $post_id == $o_id && !is_home();
		if ($is_original_post) {
			get_template_part( 'post', 'single' );
		} else {
			get_template_part( 'post', 'snippet' );
		}
	?>
<?php endwhile; get_template_part( 'post', 'navigation' ); endif; ?>
	</div><!-- /.blog-main -->
	<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- /.blog-sidebar -->

</div>

<?php get_footer(); ?>

