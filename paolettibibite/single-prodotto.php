<?php
/**
 * The Template for displaying all single posts.
 *
 * @package paolettibibite
 */

get_header();?>

<section class="single-product container clearfix">
    <?php while ( have_posts() ) : the_post();?>


            <?php get_template_part( 'content', 'prodotto' ); ?>


        <?php //paolettibibite_content_nav( 'nav-below' ); ?>

    <?php endwhile; // end of the loop. ?>
</section>
<?php get_footer(); ?>