		</div> <!-- /container -->        
		<footer>
			<div class="container">
					<div class="navbar-menu">
						
						<?php
							wp_nav_menu( array(
								'menu'       => 'navbar-footer',
								'theme_location' => 'navbar-footer',
								'depth'      => 2,
								'container'  => false,
								'menu_class' => 'nav navbar-nav',
								'fallback_cb' => 'topbar_nav_fallback',
								'walker' => new wp_bootstrap_navwalker())
							);        
						 ?>
					</div>


			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
