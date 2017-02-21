<?php
/*
Template Name: List Children Links
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content page-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title" itemprop="headline"><?php the_title();?></h1>
				<?php the_content(); ?>
				<?php
					$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
					if ($children) { ?>
						<ul>
							<?php echo $children; ?>
						</ul>
			<?php } endwhile; endif; ?>
			
		</main>
	</div>
</div> 
<?php get_footer(); ?>