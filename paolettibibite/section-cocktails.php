<?php
/**
 * The Template for displaying all single posts.
 *
 * @package paolettibibite
 */
wp_reset_postdata();

    $cocktails_args = array(
        'posts_per_page' => 6,
        'post_type'      => 'cocktail',

    );
    $cocktails_query = new WP_Query( $cocktails_args );
    while ( $cocktails_query->have_posts() ) : $cocktails_query->the_post();

        get_template_part('content', 'cocktail');
    endwhile;
    wp_reset_postdata();
?>
