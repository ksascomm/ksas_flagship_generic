<?php get_header(); ?>

<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>	
	<div class="nine columns wrapper radius-left offset-topgutter">
		<?php $theme_option = flagship_sub_get_global_options(); ?>	
		<section class="content">
		<h2><?php echo $theme_option['flagship_sub_feed_name']; ?></h2>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">		
		<section class="twelve columns">
				<a href="<?php the_permalink(); ?>">
					<h6><?php the_date(); ?></h6>
					<h5><?php the_title();?></h5>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="floatleft">
							<?php the_post_thumbnail('thumbnail'); ?>
						</div>
					<?php } ?>
					<?php the_excerpt(); ?>
				</a>
				<hr>
		</section>
	</div>
	<?php endwhile; endif; ?>		
	</div>	<!-- End main content (left) section -->
</div> 
<?php get_footer(); ?> 