<?php get_header(); ?>

<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>	
	<div class="nine columns wrapper radius-left offset-topgutter">
		<?php $theme_option = flagship_sub_get_global_options(); ?>	
		<main class="content post-archive">
		<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
		
		<?php $paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
				$news_archive_query = new WP_Query(array(
					'post_type' => 'post',
					'posts_per_page' => 10,
					'paged' => $paged
				)); 

		while ($news_archive_query->have_posts()) : $news_archive_query->the_post(); ?>
		<div class="row">		
		<article id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
			<h5 class="black" itemprop="datePublished"><?php the_date(); ?></h5>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			<?php if ( has_post_thumbnail()) { ?> 
				<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
			<?php } ?>
			<?php the_excerpt(); ?>
				<hr>
		</article>
		</div>
	
	<?php endwhile;?>
		<div class="row">
			<?php flagship_pagination($news_archive_query->max_num_pages); ?>		
		</div>

	</main>	
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 