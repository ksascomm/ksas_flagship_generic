<footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
  	<div class="row hide-for-print">		
  		<?php //Check Theme Options for Quicklinks setting 
	  		$theme_option = flagship_sub_get_global_options(); 
	  		if ( $theme_option['flagship_sub_quicklinks']  == '1' ) {
	  				global $switched;
	  				$quicklinks_id = $theme_option['flagship_sub_quicklinks_id'];
	  				switch_to_blog($quicklinks_id); }  
	  		
	  		//Quicklinks Menu
	  		wp_nav_menu( array( 
				'theme_location' => 'quick_links', 
				'menu_class' => 'nav-bar', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav', 
				'container_id' => 'quicklinks',
				'container_class' => 'three column', 
				'walker' => new foundation_navigation() ) ); 
			
			//Return to current site
			if ( $theme_option['flagship_sub_quicklinks']  == '1' ) { restore_current_blog(); }
			
			//Footer Links
			 wp_nav_menu( array( 
				'theme_location' => 'footer_links', 
				'menu_class' => 'inline-list', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav', 
				'container_class' => 'seven column', 
				'walker' => new foundation_navigation() ) ); 
		 ?>
		<!-- Social Media -->
		<nav class="two column">
			<a href="http://facebook.com/JHUArtsSciences" title="Facebook"><span class="fa fa-facebook-official fa-2x"></span></a>
			<a href="https://www.instagram.com/JHUArtsSciences/" title="Instagram"><span class=" fa fa-instagram fa-2x"></span></a>
			<a href="https://twitter.com/JHUArtsSciences" title="Twitter"><span class="fa fa-twitter fa-2x"></span></a>
			<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-2x"></span></a>
		</div>
		
		
  	</div>
  	<!-- Copyright and Address -->
  	<div class="row" id="copyright">
  		<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
  	</div>
	<div class="row hide-for-print">
		<div class="four columns centered">
			<a href="http://www.jhu.edu"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University Shield"/></a>
		</div>
	</div>
  </footer>

  <?php locate_template('parts-script-initiators.php', true, false); ?>

  <?php wp_footer(); ?>
	</body>
</html>