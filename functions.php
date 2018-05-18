<?php
//Add Theme Options Page
	if(is_admin()){	
		require_once('assets/functions/theme-options-init.php');
	}
	
	//Collect current theme option values
		function flagship_sub_get_global_options(){
			$flagship_sub_option = array();
			$flagship_sub_option 	= get_option('flagship_sub_options');
		return $flagship_sub_option;
		}
	
	//Function to call theme options in theme files 
		$flagship_sub_option = flagship_sub_get_global_options();

//Add custom background option
	
function academic_flagship_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 125, 125, true );   // default thumb size
	add_image_size( 'directory', 90, 130, true );
	add_theme_support( 'automatic-feed-links' ); // rss thingy
	$bg_args = array(
		'default-color'          => '#000000',
		'default-image'          => get_template_directory_uri() . '/assets/images/bg-default.jpg',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $bg_args  );
	add_theme_support( 'menus' );            
	register_nav_menus(                      
		array( 
			'main_nav' => 'The Main Menu', 
			'search_bar' => 'Search Bar Links',
			'footer_links' => 'Footer Links',
			'quick_links' => 'Quick Links'
		)
	);	
}

// Initiate Theme Support
add_action('after_setup_theme','academic_flagship_theme_support');

//Register Sidebar
	if ( function_exists('register_sidebar') ) 
		register_sidebar(array(
			'name'          => 'Under Navigation',
			'id'            => 'under-nav-sb',
			'description'   => '',
			'before_widget' => '<div id="widget" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="blue_bg widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));
	if ( function_exists('register_sidebar') ) 
		register_sidebar(array(
			'name'          => 'Homepage Sidebar',
			'id'            => 'homepage-sb',
			'description'   => 'This sidebar will only appear on the homepage',
			'before_widget' => '<div id="widget" class="widget %2$s row">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="blue_bg widget_title"><h5 class="white">',
			'after_title'   => '</h5></div>' 
			));

/**********DELETE TRANSIENTS******************/

function delete_intranet_transients($post_id) {
	global $post;
	if (isset($_GET['post_type'])) {		
		$post_type = $_GET['post_type'];
	}
	else {
		$post_type = $post->post_type;
	}
	switch($post_type) {
		case 'post' :
			delete_transient('news_query');
		break;
		
		case 'slider' :
			delete_transient('slider_query');
		break;
	}
}

add_action('save_post','delete_intranet_transients');

function get_the_directory_filters($post) {
	$directory_filters = get_the_terms( $post->ID, 'filter' );
					if ( $directory_filters && ! is_wp_error( $directory_filters ) ) : 
						$directory_filter_names = array();
							foreach ( $directory_filters as $directory_filter ) {
								$directory_filter_names[] = $directory_filter->slug;
							}
						$directory_filter_name = join( " ", $directory_filter_names );
						
					endif;
					return $directory_filter_name;
}

function get_the_roles($post) {
	$roles = get_the_terms( $post->ID, 'role' );
					if ( $roles && ! is_wp_error( $roles ) ) : 
						$role_names = array();
							foreach ( $roles as $role ) {
								$role_names[] = $role->slug;
							}
						$role_name = join( " ", $role_names );
						
					endif;
					return $role_name;
}

//Add Open Graph Meta Info from the actual article data, or customize as necessary
	function facebook_open_graph() {
	    global $post;
	    if ( !is_singular()) //if it is not a post or a page
	        return;
		if($excerpt = $post->post_content) 
	        {
 				$excerpt = strip_tags($post->post_content);
				$excerpt = str_replace("", "'", $excerpt);
				$excerpt = wp_trim_words($post->post_content, 25, '...');
        	} 
        	else 
        	{
            	$excerpt = get_bloginfo('title');
		}

	        echo '<meta property="og:title" content="' . get_the_title() ." | " . get_bloginfo('title')  . '"/>';
			echo '<meta property="og:description" content="' . $excerpt . '"/>';
	        echo '<meta property="og:type" content="article"/>';
	        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	        echo '<meta name="twitter:card" content="summary" />';
			echo '<meta name="twitter:site" content="@JHUArtsSciences" />';
	        
	    // Customize the below with the name of your site
	        echo '<meta property="og:site_name" content="'. get_bloginfo( 'title' ) .'"/>';
	        if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
	    //Create a default image on your server or an image in your media library, and insert it's URL here
	        $default_image=  get_template_directory_uri() . '/assets/images/bg-default.jpg';
	        echo '<meta property="og:image" content="' . $default_image . '"/>';
	    }
	    else{
	        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	    }

	    echo "
	";
	}
add_action( 'wp_head', 'facebook_open_graph', 5 );

?>