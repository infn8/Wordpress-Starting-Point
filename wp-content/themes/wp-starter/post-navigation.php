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
