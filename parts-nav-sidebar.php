	<nav class="three columns hide-for-print" role="navigation" id="sidebar"> <!-- Begin Sidebar -->
		<div class="blue_bg radius-topleft offset-gutter hide-for-small" id="sidebar_header">
			<h5 class="white">Site Navigation</h5>
		</div>

		<div class="row">
			<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'menu_class' => 'nav-bar vertical', 
				'fallback_cb' => 'foundation_page_menu',
				'walker' => new foundation_navigation(),
				'container' => 'div',
				'container_id'=> 'main-nav',
				'depth' => 3 )); ?> 
		</div> <!--End Site Navigation Links -->
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('under-nav-sb') ) : ?><?php endif; ?>
	</nav> <!-- End Sidebar -->
