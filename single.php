<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<main class="nine columns wrapper radius-right offset-topgutter" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<div class="content page-content">
			<article id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
					<h1 class="page-title" itemprop="headline"><?php the_title();?></h1>
						<?php if ( has_post_thumbnail()) { ?> 
							<div class="floatleft">
								<?php the_post_thumbnail('full',array('class'	=> "radius-topright")); ?>
							</div>
						<?php } ?>
					<?php the_content(); ?>
			</article>
		</div>
	</main>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>	
</div> 
<?php get_footer(); ?> 