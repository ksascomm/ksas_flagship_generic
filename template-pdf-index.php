<?php
/*
Template Name: PDF Index List
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content();  endwhile; endif; ?>
		
		<h3>PDF Index</h3>
		<?php $pdf_query = new WP_Query(array(
			'post_status' => 'any',
			'post_type' => 'attachment',
			'post_mime_type' => 'application/pdf',
			'posts_per_page' => '-1',
			'orderby' => 'title',
			'order' => 'ASC')); 
			
			if ( $pdf_query->have_posts() ) : while ( $pdf_query->have_posts() ) : $pdf_query->the_post(); ?>
			
			<h5><?php the_title(); ?>&nbsp;<?php echo wp_get_attachment_link($id, 'thumbnail', 0, 0, '(Download)'); ?></h5>
			<?php the_excerpt(); ?>
		<?php endwhile; endif; ?>
		</section>
	</div>
</div> 
<?php get_footer(); ?>