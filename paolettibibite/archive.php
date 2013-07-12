<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package paolettibibite
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>
    <section id="blog" class="slide">

        <?php /* Start the Loop */ ?>
        <div id="news-list" class="container clearfix">
            <div class="grid_5 omega">
                <h2 class="title-slide">
                    <?php
                    if ( is_category() ) :
                        printf( __( '%s', 'paolettibibite' ), '<span>' . single_cat_title( '', false ) . '</span>' );

                    elseif ( is_tag() ) :
                        printf( __( '%s', 'paolettibibite' ), '<span>' . single_tag_title( '', false ) . '</span>' );

                    elseif ( is_author() ) :
                        /* Queue the first post, that way we know
                         * what author we're dealing with (if that is the case).
                        */
                        the_post();
                        printf( __( 'Author Archives: %s', 'paolettibibite' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                        /* Since we called the_post() above, we need to
                         * rewind the loop back to the beginning that way
                         * we can run the loop properly, in full.
                         */
                        rewind_posts();

                    elseif ( is_day() ) :
                        printf( __( 'Daily Archives: %s', 'paolettibibite' ), '<span>' . get_the_date() . '</span>' );

                    elseif ( is_month() ) :
                        printf( __( 'Monthly Archives: %s', 'paolettibibite' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

                    elseif ( is_year() ) :
                        printf( __( 'Yearly Archives: %s', 'paolettibibite' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

                    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                        _e( 'Asides', 'paolettibibite' );

                    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                        _e( 'Images', 'paolettibibite');

                    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                        _e( 'Videos', 'paolettibibite' );

                    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                        _e( 'Quotes', 'paolettibibite' );

                    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                        _e( 'Links', 'paolettibibite' );

                    else :
                        _e( 'Archivio', 'paolettibibite' );

                    endif;
                    ?>

                </h2>
            </div>
            <div class="grid_9">
                <?php while ( have_posts() ) : the_post(); ?>


                    <?php get_template_part( 'content', 'blog' ); ?>



                <?php endwhile; ?>
            </div>
            <?php  echo wp_pagenavi(); ?>
        </div>

    </section> <!--#section-->
    <?php else : ?>

        <?php get_template_part( 'no-results', 'archive' ); ?>

    <?php endif; ?>


<?php get_footer(); ?>
