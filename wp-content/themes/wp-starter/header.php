<!DOCTYPE html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
		<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<title></title>
				<meta name="description" content="">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<style>
						body {
								padding-top: 50px;
								padding-bottom: 20px;
						}
				</style>
				<!-- Begin wp_head() -->
				<?php wp_head(); ?>
				<!-- End wp_head() -->
		</head>
		<body <?php body_class(); ?>>
				<!--[if lt IE 7]>
						<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
				<![endif]-->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('title' ); ?></a>
				</div>
				<div class="navbar-collapse collapse">
					<div class="navbar-menu navbar-right">
						
						<?php
							wp_nav_menu( array(
								'menu'       => 'navbar-top',
								'theme_location' => 'navbar-top',
								'depth'      => 2,
								'container'  => false,
								'menu_class' => 'nav navbar-nav',
								'fallback_cb' => 'topbar_nav_fallback',
								'walker' => new wp_bootstrap_navwalker())
							);        
						 ?>
					</div>
				</div><!--/.navbar-collapse -->
			</div>
		</div>
		<?php 
			// get_template_part('jumbotron' ); 
		?>
		<div class="container">
