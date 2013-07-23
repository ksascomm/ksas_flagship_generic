<?php
/*
Template Name: People Directory
*/
?>	

<?php get_header(); 

	$lab_people_query = new WP_Query(array(
			'post_type' => 'people',
			'meta_key' => 'ecpt_people_alpha',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'posts_per_page' => '-1'));        	
?>

<?php 
$post_id_array = array();
while ( $lab_people_query->have_posts() ) : $lab_people_query->the_post();
    $post_id_array[] = get_the_ID();
endwhile;
$header_test = wp_get_object_terms($post_id_array, 'role', array('fields' => 'slugs')); ?>
<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<section>
	<section class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title();?></h2>
		<?php endwhile; endif; ?>
	</section>
	
	<section class="row" id="fields_container">
		<?php if (in_array('faculty', $header_test) == true) { ?><h3>Faculty</h3><?php } ?>
		<ul class="twelve columns" id="directory">
		<?php if($lab_people_query->have_posts()) : while ($lab_people_query->have_posts()) : $lab_people_query->the_post(); ?>
		<?php if (has_term('faculty', 'role')) {locate_template('parts-people-loop.php', true, false);} 
		 endwhile; endif;?>
		</ul>
		<?php if (in_array('research', $header_test) == true) { ?><h3>Research Staff</h3><?php } ?>
		<ul class="twelve columns" id="directory">
		<?php if($lab_people_query->have_posts()) : while ($lab_people_query->have_posts()) : $lab_people_query->the_post(); ?>
		<?php if (has_term('research', 'role')) {locate_template('parts-people-loop.php', true, false);} 
		 endwhile; endif;?>
		</ul>
		
		<?php if (in_array('post-doc', $header_test) == true) { ?><h3>Postdoctoral Fellows</h3><?php } ?>
		<ul class="twelve columns" id="directory">
		<?php if($lab_people_query->have_posts()) : while ($lab_people_query->have_posts()) : $lab_people_query->the_post(); ?>
		<?php if (has_term('post-doc', 'role')) {locate_template('parts-people-loop.php', true, false);} 
		 endwhile; endif;?>
		</ul>

		<?php if (in_array('graduate', $header_test) == true) { ?><h3>Graduate Students</h3><?php } ?>
		<ul class="twelve columns" id="directory">
		<?php if($lab_people_query->have_posts()) : while ($lab_people_query->have_posts()) : $lab_people_query->the_post(); ?>
		<?php if (has_term('graduate', 'role')) {locate_template('parts-people-loop.php', true, false);} 
		 endwhile; endif;?>
		</ul>

		<?php if (in_array('undergraduate', $header_test) == true) { ?><h3>Undergraduate Students</h3><?php } ?>
		<ul class="twelve columns" id="directory">
		<?php if($lab_people_query->have_posts()) : while ($lab_people_query->have_posts()) : $lab_people_query->the_post(); ?>
		<?php if (has_term('undergraduate', 'role')) {locate_template('parts-people-loop.php', true, false);} 
		 endwhile; endif;?>
		</ul>
		
		<?php if (in_array('other', $header_test) == true) { ?><h3>Other People</h3><?php } ?>
		<ul class="twelve columns" id="directory">
		<?php if($lab_people_query->have_posts()) : while ($lab_people_query->have_posts()) : $lab_people_query->the_post(); ?>
		<?php if (has_term('other', 'role')) {locate_template('parts-people-loop.php', true, false);} 
		 endwhile; endif;?>
		</ul>

</section>

	<section class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  the_content();  endwhile; endif; ?>
	</section>

</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>