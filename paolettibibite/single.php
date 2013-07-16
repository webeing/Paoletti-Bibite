<?php
/**
 * The Template for displaying all single posts.
 *
 * @package paolettibibite
 */

get_header(); ?>
<section id="post-<?php the_slug(); ?>" class="inner page">
    <div class="bubble">
        <div class="container clearfix">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="grid_8">
                <?php get_template_part( 'content', 'single' ); ?>

                <?php paolettibibite_content_nav( 'nav-below' ); ?>
                </div>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>

            <?php endwhile; // end of the loop. ?>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>