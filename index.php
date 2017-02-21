<?php get_header(); ?>

<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>	
	<div class="nine columns wrapper radius-left offset-topgutter">
		<?php $theme_option = flagship_sub_get_global_options(); ?>	
		<main class="content post-archive">
		<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
	
	<?php endwhile; endif; ?>	
	</main>	
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 