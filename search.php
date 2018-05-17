<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="row sidebar_bg radius10">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
	<div class="nine columns wrapper radius-right offset-topgutter">
		<h1 class="page-title">Search Results: <strong><?php echo esc_attr(get_search_query()); ?></strong></h2>
        
        <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        <article <?php post_class(''); ?> itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php the_ID(); ?>">
            <header class="article-header" aria-label="<?php the_title();?>">   
                <h3 class="entry-title single-title search-result" itemprop="headline">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h3>
            </header> <!-- end article header -->
                            
            <div class="entry-content" itemprop="articleBody">
                <?php $content = get_the_content();
                $trimmed_content = wp_trim_words( $content, 60, '[...]' ); ?>
                <p><?php echo $trimmed_content; ?></p>
            </div> <!-- end article section -->
                                                                    
        </article> <!-- end article -->
        <hr>
        <?php endwhile; ?>

        <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
            ) );
            ?>

        <?php else : ?>
                
            <header class="article-header">
                <h3><?php _e('Sorry, No Results.', 'jointswp');?></h3>
            </header>
            
            <section class="entry-content">
                <p><?php _e('Try your search again.', 'jointswp');?></p>
            </section>
                        
        <?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>  