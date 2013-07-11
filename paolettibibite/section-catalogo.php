<?php
/**
 * The Template for displaying all single posts.
 *
 * @package paolettibibite
 */
wp_reset_postdata();

    $catalogo_args = array(
        'posts_per_page' => 30,
        'post_type'              => 'prodotto',

    );
    $catalog_query = new WP_Query( $catalogo_args );
    while ( $catalog_query->have_posts() ) : $catalog_query->the_post();

        get_template_part('content', 'catalogo-prodotti');
    endwhile;
    wp_reset_postdata();
?>
