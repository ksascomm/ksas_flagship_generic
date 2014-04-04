<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title><?php create_page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
  
  <!-- CSS Files: All pages -->
  <script async type="text/javascript" src="http://fast.fonts.com/jsapi/c5f514c7-d786-4bfb-9484-ea6c8fbd263f.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/foundation.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/flagship.css">
  <!-- CSS Files: Conditionals -->
  
  <!-- Modernizr and Jquery Script -->
  <script async src="<?php echo get_template_directory_uri() ?>/assets/javascripts/modernizr.foundation.js"></script>
  <?php wp_enqueue_script('jquery'); ?> 
  <?php wp_head(); ?>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script async src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<?php global $blog_id;
	$site_id = 'site-' . $blog_id; ?>
<body <?php body_class($site_id); ?>>
	<header class="hide-for-print">
		<div class="row show-for-small">
			<div class="four columns centered blue_bg">
			<div class="mobile-logo centered"><a href="<?php echo network_site_url(); ?>">Home</a></div>
			<h2 class="white" align="center"><?php echo get_bloginfo( 'title' ); ?></h2>
			</div>
		</div>
	
		<div class="row hide-for-print">
			<div id="search-bar" class="offset-by-seven five mobile-four columns">
				<div class="row">
					<div class="six columns mobile-two">
					<?php $theme_option = flagship_sub_get_global_options(); 
							$collection_name = $theme_option['flagship_sub_search_collection'];
					?>

					<form method="GET" action="<?php echo site_url('/search'); ?>">
						<input type="submit" class="icon-search" value="&#xe004;" />
						<input type="text" name="q" placeholder="Search this site" />
						<input type="hidden" name="site" value="<?php echo $collection_name; ?>" />

					</form>
					</div>
						<?php wp_nav_menu( array( 
							'theme_location' => 'search_bar', 
							'menu_class' => '', 
							'fallback_cb' => 'foundation_page_menu', 
							'container' => 'div',
							'container_id' => 'search_links', 
							'container_class' => 'six columns mobile-two hide-for-mobile links inline',
							'depth' => 1,
							'items_wrap' => '%3$s', )); ?> 
				</div>	
			</div>	<!-- End #search-bar	 -->
		</div>
		<div class="row">
			<div class="twelve columns hide-for-small radius10" id="logo_nav">
				<li class="logo"><a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences">Krieger School of Arts & Sciences</a></li>
				
				<a href="<?php echo site_url(); ?>"><h1 class="white"><span class="small"><?php echo get_bloginfo ( 'description' ); ?></span>
					<?php echo get_bloginfo( 'title' ); ?></h1></a>
			
			</div>
		</div>
		</header>